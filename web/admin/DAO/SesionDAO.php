<?php
/**
 * Created by PhpStorm.
 * User: Eze
 * Date: 16/07/15
 * Time: 20:03
 */

namespace web\admin\DAO;


use web\admin\Interfaces\iSesion;
use web\admin\Conexion;

require_once '../db/Conexion.php';
require_once '../Interfaces/iSesion.php';

class SesionDAO implements iSesion
{
    private $con;

    function __construct()
    {
        $this->con = Conexion::Conectar();
    }

    function IniciarSesion($entidad, $array = null)
    {

        try {
            $sql = $this->con->prepare("SELECT * FROM usuarios
            WHERE nombre = :nombre AND password = :password LIMIT 1");
            $nombre = $entidad->getNombre();
            $password = $entidad->getPassword();
            $sql->bindParam(":nombre", $nombre);
            $sql->bindParam(":password", $password);
            $sql->execute();
            if ($sql->rowCount() == 1) {
                session_start();
                setcookie('usuario', $nombre);
                setcookie('password', sha1($password));
                $_SESSION['usuario'] = $entidad->getNombre();
                return true;

            }
            return false;


        } catch (\PDOException $e) {
            return "Error al iniciar sesión: " . $e->getMessage();
        }
    }

    function CerrarSesion($entidad, $array = null)
    {
        session_name('quadro');
        session_start();
        if (isset($_SESSION['usuario'])) {
            session_destroy();
            unset($entidad);
            return true;
            exit();
        }
        return false;
    }

} 