<?php 

namespace CBS\Src;

class User{

    /**
     * Class constructor
     */
    function __construct() {
        register_activation_hook( CBS, [$this,'cbs_create_custom_user'] );
        add_action( 'user_register', [$this, 'cbs_set_user_registration_date'] );
    }

    /**
     * Set current date
     */
    function cbs_set_user_registration_date( $user_id ) {
        update_user_meta( $user_id, 'cbs_registration_date', time() );
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