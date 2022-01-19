<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\View;

use Cake\View\View;
// use BootstrapUI\View\UIView;
use BootstrapUI\View\UIViewTrait;

/**
 * Application View
 *
 * Your application's default view class
 *
 * @link https://book.cakephp.org/4/en/views.html#the-app-view
 */

 //通常のAppViewクラス
// class AppView extends View
// {
//     /**
//      * Initialization hook method.
//      *
//      * Use this method to add common initialization code like loading helpers.
//      *
//      * e.g. `$this->loadHelper('Html');`
//      *
//      * @return void
//      */
//     public function initialize(): void
//     {
//     }
// }

//UIViewTraitを使わない方式
// class AppView extends UIView
// {
//     /**
//      * Initialization hook method.
//      */
//     public function initialize(): void
//     {
//         // Don't forget to call parent::initialize()
//         parent::initialize();
//     }
// }

//UIViewTraitを使った方式
class AppView extends View
{
    use UIViewTrait;

    /**
     * Initialization hook method.
     */
    public function initialize(): void
    {
        parent::initialize();

        // Call the initializeUI method from UIViewTrait
        $this->initializeUI();
    }
}