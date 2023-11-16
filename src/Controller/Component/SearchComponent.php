<?php

namespace CakeLte\Controller\Component;

use Cake\Controller\Component;

class SearchComponent extends Component
{
    public function prep($model_name)
    {
        $session = $this->getController()->getRequest()->getSession();

        $session_key = $model_name . ".index.search";
        $request = $this->getController()->getRequest();

        $search = array_filter($request->getQuery(), function ($key_name) {
            return strpos($key_name, "earch_");
        }, ARRAY_FILTER_USE_KEY);


        if (empty($search)) {
            if ($session->check($session_key)) {
                $search = $session->read($session_key);
            } 
        } else {
            if ($request->getQuery('action') && $request->getQuery('action') == 'clear') {
                $this->getController()->set('search', []);
                $search = [];
                $session->delete($session_key);
            } else {
                $session->write($session_key, $request->getQuery());
            }
        }

        $this->getController()->set('search', $search);
        return  $search;
    }
}
