<?php 

namespace CBS\Src;

class User{

    /**
     * Class constructor
     */
    function __construct() {
        register_activation_hook( CBS, [$this,'cbs_create_custom_user'] );
    }

    /**
     * Creatign custom user
     */
    function cbs_create_custom_user() {

        $cbs_usr_roles = [
            [
                'role'          => 'basic_member',
                'display_name'  => __( 'Basic Member', 'cbs' ),
                'capabilities'  => [
                    'read' => true,
                ],
            ],
            [
                'role'          => 'pro_member',
                'display_name'  => __( 'Pro Member', 'cbs' ),
                'capabilities'  => [
                    'read' => true,
                ],
            ],
            [
                'role'          => 'premium_member',
                'display_name'  => __( 'Premium Member', 'cbs' ),
                'capabilities'  => [
                    'read' => true,
                ],
            ],
        ];

        //register custom user role
        foreach( $cbs_usr_roles as $role_data ) {

            if ( ! get_role( $role_data['role'] ) ) {
                add_role(
                    $role_data['role'],
                    $role_data['display_name'],
                    $role_data['capabilities']
                );
            }
        }

    }

}