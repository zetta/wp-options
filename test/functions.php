<?php



function load_theme_textdomain($name,$path){}
function get_template_directory(){ return getcwd(); }
function __($s,$n){ return _($s); }


function get_bloginfo($info)
{
    switch ($info)
    {
        case 'template_directory':
            return getcwd();
        default:
            throw new Exception('unknown '.$info);
    }
}





function get_option($opt, $default = false)
{
    if( isset( MockOptions::$options[$opt]) )
        $value = MockOptions::$options[$opt];
    else
        return $default;
    if ( is_serialized( $value ) ) // don't attempt to unserialize data that wasn't serialized going in
		return unserialize( $value );
	return $value;    
}

function update_option( $opt, $val )
{
    if ( is_array( $val ) || is_object( $val ) )
		$val = serialize( $val );
    elseif ( is_serialized( $val ) )
		$val =  serialize( $val );
    MockOptions::$options[$opt] = $val;
}

function wp_die($msg)
{
    throw new WpDieException($msg);
}

function is_serialized( $data ) {
	// if it isn't a string, it isn't serialized
	if ( !is_string( $data ) )
		return false;
	$data = trim( $data );
	if ( 'N;' == $data )
		return true;
	if ( !preg_match( '/^([adObis]):/', $data, $badions ) )
		return false;
	switch ( $badions[1] ) {
		case 'a' :
		case 'O' :
		case 's' :
			if ( preg_match( "/^{$badions[1]}:[0-9]+:.*[;}]\$/s", $data ) )
				return true;
			break;
		case 'b' :
		case 'i' :
		case 'd' :
			if ( preg_match( "/^{$badions[1]}:[0-9.E-]+;\$/", $data ) )
				return true;
			break;
	}
	return false;
}
