<?php

/**
 * Esta excepción no existe en la libreria normal, sin embargo en los test la funcion wp_die
 * lanza una excepción de tipo WpDieException 
 */
class WpDieException extends Exception 
{

}


/**
 * El objeto donde se guardan las options, simula la tabla de wordpress a la que acceden las funciones
 * update_option y get_option 
 */
class MockOptions
{
    public static $options = array();
}


/*
 * la clase wpdb, este objeto lo deberia dejar de usar cuando aprenda a utilizar bien los MockObjects
 */
class wpdb
{

}
