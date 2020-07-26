<?php
/**
 * tinycp driver
 *
 * Enable the password driver in Roundcube (https://roundcube.net/) for the TinyCP Lightweight Linux Control Panel (https://tinycp.com/).
 * See README for install instructions.
 *
 * @version 1.2
 * @author Ricky Mendoza (HelloWorld@rickymendoza.dev)
 * 
 * Copyright (C) 2020 Ricky Mendoza
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it 1will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <https://www.gnu.org/licenses/>.
 */

require_once("TinyCPConnector.php");

class rcube_tinycp_password
{
    public function save($currpass, $newpass, $username)
    {
        $tinycp_host = rcmail::get_instance()->config->get('tinycp_host');
        $tinycp_port = rcmail::get_instance()->config->get('tinycp_port');
        $tinycp_user = rcmail::get_instance()->config->get('tinycp_user');
        $tinycp_pass = rcmail::get_instance()->config->get('tinycp_pass');
        
        if ($tinycp_host && $tinycp_port && $tinycp_user && $tinycp_pass){
            try {
                $tcp = new TinyCPConnector($tinycp_host,$tinycp_port);
                $tcp->Auth($tinycp_user, $tinycp_pass); 
                $error_message = $tcp->mail___mailserver___email_pass_change2($username, $newpass);
            } catch (Exception $th) {
                $error_message = $th->getMessage();
            }   
        }else{
            $error_message = "Missing configuration value(s). ";
        }
       
        if ($error_message){
            rcube::raise_error(array(
                'code' => 600,
                'type' => 'php',
                'file' => __FILE__, 'line' => __LINE__,
                'message' => $error_message
        ), true, false);
            echo "error found";
            return PASSWORD_ERROR;
        }
        return PASSWORD_SUCCESS;
    }
}
?>