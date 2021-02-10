<?php
$url = dirname(dirname(dirname(__DIR__)));
require_once($url."/assets/model/generalClass.php");

class invoices extends general {
    /**
     * @desc    Obtener facturas según filtros
     * @param   String  $fecha_inicio
     *          String  $fecha_final
     *          Int     $estatus
     * @return  Array   $Array
     */
    public function get(?string $fecha_inicio, ?string $fecha_final, ?int $estatus, int $id_fiscal){
        $sql = "SELECT 
        facturas.*,
        moneda.nombre AS moneda
        FROM sys.facturas
        INNER JOIN sys.clientes ON facturas.id_fiscal = clientes.id_fiscal
        INNER JOIN sys.moneda ON facturas.id_moneda = moneda.id
        INNER JOIN sys.pais ON facturas.id_pais_factura = pais.id
        WHERE TRUE";
        if(!empty($fecha_inicio) AND !empty($fecha_final)){
            $sql .= " AND facturas.fecha_factura >= '$fecha_inicio' AND facturas.fecha_factura <= '$fecha_final'";
        }
        if(!empty($estatus)){
            $sql .= " AND facturas.estado_factura = $estatus";
        }
        if(!empty($id_fiscal)){
            $sql .= " AND facturas.id_fiscal = $id_fiscal";
        }
        $sql .= " ORDER BY facturas.id ASC";
        return $this->executeSql($sql, '');
    }

    /**
     * @desc    Registrar facturas
     * @param   Int     $id_fiscal
     *          String  $fecha_factura
     *          String  $valor_factura
     *          Int     $id_moneda
     *          Int     $id_estado
     *          Int     $id_pais_factura
     * @return  Boolean
     */
    public function create(Int $id_fiscal, String $fecha_factura, String $valor_factura, Int $id_moneda, Int $id_estado, Int $id_pais_factura){
        // Convertir el formato de la fecha a AAAA-MM-DD
        $fecha_factura_temp = explode('/', $fecha_factura);
        $fecha_factura = $fecha_factura_temp[2].'-'.$fecha_factura_temp[0].'-'.$fecha_factura_temp[1];
        

        $sql = "INSERT INTO sys.facturas (id_fiscal, fecha_factura, valor_factura, id_moneda, id_estado, id_pais_factura) VALUES (:id_fiscal, :fecha_factura, :valor_factura, :id_moneda, :id_estado, :id_pais_factura)";
        $arrayParam = array(':id_fiscal' => $id_fiscal, ':fecha_factura' => $fecha_factura, ':valor_factura' => $valor_factura, ':id_moneda' => $id_moneda, ':id_estado' => $id_estado, ':id_pais_factura' => $id_pais_factura);
        return $this->executeSql($sql, $arrayParam);
    }
}
?>