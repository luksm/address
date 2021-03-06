<?php
/**
 * Address Model for Address Plugin
 *
 * CakePHP(tm) : Rapid Development Framework (http://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (http://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @category  Plugin
 * @package   AddressModel
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Address
 */

App::uses('AddressAppModel', 'Address.Model');

/**
 * Address Model
 *
 * @category  Plugin
 * @package   AddressModel
 * @author    Lucas Machado <eu@lucasms.net>
 * @copyright 2014 Lucas Machado
 * @license   http://www.opensource.org/licenses/mit-license.php MIT License
 * @version   1.0
 * @link      http://github.com/luksm/Address
 * @property State $State
 */
class Address extends AddressAppModel
{

    /**
     * Defines the prefix for the table
     *
     * @var string
     */
    public $tablePrefix = 'address_';

    /**
     * Defines the display Field
     *
     * @var string
     */
    public $displayField = 'address';

    /**
     * Validation rules
     *
     * @var array
     */
    public $validate = array(
        'address' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'zip' => array(
            'notEmpty' => array(
                'rule' => array('notEmpty'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'neighbourhood_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
        'city_id' => array(
            'numeric' => array(
                'rule' => array('numeric'),
                //'message' => 'Your custom message here',
                //'allowEmpty' => false,
                //'required' => false,
                //'last' => false, // Stop validation after this rule
                //'on' => 'create', // Limit validation to 'create' or 'update' operations
            ),
        ),
    );

    //The Associations below have been created with all possible keys, those that are not needed can be removed

    /**
     * belongsTo associations
     *
     * @var array
     */
    public $belongsTo = array(
        'Neighbourhood' => array(
            'className' => 'Address.Neighbourhood',
            'foreignKey' => 'neighbourhood_id',
            'conditions' => '',
            'fields' => '',
            'order' => ''
        )
    );

    /**
     * getByZip
     *
     * Filter addresses by zipcode
     *
     * @param string $zip Zipcode
     *
     * @return array of Addresses
     *
     */
    public function getByZip($zip)
    {
        $this->Behaviors->load('Containable');
        $addresses = $this->find(
            'all',
            array(
                'conditions' => array(
                    "zip LIKE" => $zip . "%"
                ),
                'contain' => "Neighbourhood.City.State.Country"
            )
        );

        return $addresses;
    }
}
