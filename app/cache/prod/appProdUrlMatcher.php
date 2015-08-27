<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appProdUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appProdUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);
        $context = $this->context;
        $request = $this->request;

        // index_list
        if (rtrim($pathinfo, '/') === '') {
            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'index_list');
            }

            return array (  '_controller' => 'iut\\TaskBundle\\Controller\\TaskController::indexAction',  '_route' => 'index_list',);
        }

        // index_oauth
        if ($pathinfo === '/oauth2callback') {
            return array (  '_controller' => 'iut\\TaskBundle\\Controller\\TaskController::oauthAction',  '_route' => 'index_oauth',);
        }

        // index_list_remove_task
        if (0 === strpos($pathinfo, '/remove') && preg_match('#^/remove/(?P<idTask>[^/]++)/(?P<idList>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'index_list_remove_task')), array (  '_controller' => 'iut\\TaskBundle\\Controller\\TaskController::deleteAction',));
        }

        // index_update_task_ajax
        if ($pathinfo === '/check_task_ajax') {
            if ($this->context->getMethod() != 'POST') {
                $allow[] = 'POST';
                goto not_index_update_task_ajax;
            }

            return array (  '_controller' => 'iut\\TaskBundle\\Controller\\TaskController::checkTaskAjaxAction',  '_route' => 'index_update_task_ajax',);
        }
        not_index_update_task_ajax:

        // index_task
        if (preg_match('#^/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'index_task')), array (  '_controller' => 'iut\\TaskBundle\\Controller\\TaskController::taskAction',));
        }

        // iut_dumb_homepage
        if (0 === strpos($pathinfo, '/hello') && preg_match('#^/hello/(?P<name>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'iut_dumb_homepage')), array (  '_controller' => 'iut\\DumbBundle\\Controller\\DefaultController::indexAction',));
        }

        // iut_dumb_addition
        if (0 === strpos($pathinfo, '/dumb/addition') && preg_match('#^/dumb/addition(?:/(?P<x>\\d+)(?:/(?P<y>\\d+))?)?$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'iut_dumb_addition')), array (  '_controller' => 'iut\\DumbBundle\\Controller\\DefaultController::additionAction',  'x' => 1,  'y' => 2,));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
