<?php

/**
 * Theme customizations
 *
 * @package      Lakeholm
 * @author       Kylea Jackson
 * @copyright    Copyright (c) 2016, Kylea Jackson
 * @license      GPL-2.0+
 */
    //* Register after post widget area
  genesis_register_sidebar( array(
    'id'            => 'home-welcome',
    'name'          => __( 'Home Welcome', 'lakeholm'),
    'description'   => __( 'This is a widget area that will be shown on the front page', 'lakeholm' ),
  ) );

  //* Register after post widget area
  genesis_register_sidebar( array(
    'id'            => 'call-to-action',
    'name'          => __( 'Call To Action', 'lakeholm'),
    'description'   => __( 'This is a call to action widget area that will be shown on the front page', 'lakeholm' ),
  ) );