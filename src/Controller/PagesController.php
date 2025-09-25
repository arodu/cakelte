<?php
declare(strict_types=1);

namespace CakeLte\Controller;

use Cake\Core\Configure;
use Cake\Http\Exception\NotFoundException;

class PagesController extends AppController
{
    /**
     * @return void
     */
    public function debug(): void
    {
        if (!Configure::read('debug')) {
            throw new NotFoundException();
        }

        $this->Flash->warning(
            __('You are running this application in debug mode. Do not use debug mode in production environment.'),
        );
    }

    /**
     * @return void
     */
    public function sample(): void
    {
        if (!Configure::read('debug')) {
            throw new NotFoundException();
        }

        $this->Flash->warning(
            __('You are running this application in debug mode. Do not use debug mode in production environment.'),
        );
    }
}
