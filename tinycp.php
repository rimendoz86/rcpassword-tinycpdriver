<?php
/**
 * tinycp driver
 *
 * change password for tinycp(tinycp.com) using its http API.
 *
 * @version 1.0
 * @author Ricky Mendoza (HelloWorld@rickymendoza.dev)
 * 
 * Copyright (C) Ricky Mendoza @ RickyMendoza.dev
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see http://www.gnu.org/licenses/.
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

        $tcp = new TinyCPConnector($tinycp_host,$tinycp_port);

        if($tcp->Auth($tinycp_user, $tinycp_pass) == false)
        {
            $this->PluginError("Auth Failure");
            return PASSWORD_ERROR;
        }

        $response = $tcp->mail___mailserver___email_pass_change2($username, $newpass);

        if (!is_null($response)){
            $this->PluginError("Response Code not OK");
            return PASSWORD_ERROR;
        }
        return PASSWORD_SUCCESS;
    }
    
    public function PluginError($message){
        rcube::raise_error(array(
                'code' => 600,
                'type' => 'php',
                'file' => __FILE__, 'line' => __LINE__,
                'message' => $message
        ), true, false);
    }
}
?>