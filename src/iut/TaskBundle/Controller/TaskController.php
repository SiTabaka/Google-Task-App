<?php

namespace iut\TaskBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\Session;
use iut\TaskBundle\Form\Type\TaskType;
use iut\TaskBundle\Entity\Task;

class TaskController extends Controller
{
    public function indexAction(Request $request)
    {
        $googleClient = $this->get('happyr.google.api.client');
        $session = $request->getSession();
        if(!$session->has('token'))
        {
            $googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
            return $this->redirect($googleClient->createAuthUrl());
        }

        $token = json_decode($session->get('token'));

        if (time() > $token->expires_in + $token->created)
        {
            $googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
            return $this->redirect($googleClient->createAuthUrl());
        }

        $googleClient->setAccessToken($session->get('token'));
        
        $em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('iutTaskBundle:ListTask');
        $repository->setClient($googleClient->getGoogleClient());
    	$lists = $repository->findAll();
        return $this->render(
        	'iutTaskBundle:Task:index.html.twig', 
        	array(
        		"lists" => $lists,	
        	)
        );
    }

    public function  oauthAction(Request $request)
    {
        if($request->query->get('code'))
        {
            $code = $request->query->get('code');
            $googleClient = $this->get('happyr.google.api.client');
            $googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
            $googleClient->authenticate($code);
            $token = $googleClient->getGoogleClient()->getAccessToken();
            $session = $request->getSession();
            $session->set('token',$token);
            return $this->redirect($this->generateUrl('index_list'));

        }
        else
        {
            $error = $request->query->get('error');
            return $this->render('iutTaskBundle:Task:error.html.twig',array("error" => $error));
        }
    }

    public function taskAction(Request $request, $id)
    {        
        $googleClient = $this->get('happyr.google.api.client');
        $session = $request->getSession();
        if(!$session->has('token'))
        {
            $googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
            return $this->redirect($googleClient->createAuthUrl());
        }

        $token = json_decode($session->get('token'));

        if (time() > $token->expires_in + $token->created)
        {
            $googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
            return $this->redirect($googleClient->createAuthUrl());
        }

        $googleClient->setAccessToken($session->get('token'));
    	$em = $this->getDoctrine()->getManager();
    	$repository = $em->getRepository('iutTaskBundle:ListTask');
        $repository->setClient($googleClient->getGoogleClient());
    	$list = $repository->find($id);
        $task = new Task();

        $form  = $this->createForm(new TaskType(), $task);
        if ($form->handleRequest($request)->isValid()) {
            $repository = $em->getRepository('iutTaskBundle:Task');
            $repository->setClient($googleClient->getGoogleClient());
            $repository->insertTask($task, $id);
            $em->flush();
            return $this->redirect($this->generateUrl('index_task',array("id"=>$id)));
        }

        return $this->render(
        	'iutTaskBundle:Task:tasks.html.twig', 
        	array(
        		"tasks" => $list->getTasks(),
                "taskForm" => $form->createView(),
                "title" => $list->getName(),
				"idList" => $list->getId()
        	)
        );
    }

    public function deleteAction(Request $request, $idTask, $idList)
    {
        $googleClient = $this->get('happyr.google.api.client');
        $session = $request->getSession();
        if(!$session->has('token'))
        {
            $googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
            return $this->redirect($googleClient->createAuthUrl());
        }

        $googleClient->setAccessToken($session->get('token'));
        $em = $this->getDoctrine()->getManager();
        $repository = $em->getRepository('iutTaskBundle:Task');
        $repository->setClient($googleClient->getGoogleClient());

        $repository->removeTask($idTask, $idList);
        $em->flush();
        return $this->redirect($this->generateUrl('index_task',array("id"=>$idList)));
    }
	
	public function checkTaskAjaxAction(Request $request)
	{
			$idTask = $request->request->get('idTask');
			$idList = $request->request->get('idList');
			$check = $request->request->get('check');
			
			$googleClient = $this->get('happyr.google.api.client');
			$session = $request->getSession();
			if(!$session->has('token'))
			{
				$googleClient->getGoogleClient()->setScopes([\Google_Service_Tasks::TASKS]);
				return $this->redirect($googleClient->createAuthUrl());
			}
			$googleClient->setAccessToken($session->get('token'));
			
			$em = $this->getDoctrine()->getManager();
			$repository = $em->getRepository('iutTaskBundle:Task');
			$repository->setClient($googleClient->getGoogleClient());
			$task = $repository->findTask($idTask, $idList);
			if($check == "needsAction"){
				$task->setCompleted(null);
			}
			$task->setStatus($check);
			$repository->updateTask($idTask, $idList, $task);
			return new Response(200);
	}
}
