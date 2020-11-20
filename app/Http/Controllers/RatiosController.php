<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\Factory;
use Illuminate\Foundation\Application;
use Illuminate\Http\Response;
use  Illuminate\Support\Facades\Input ;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class RatiosController extends Controller
{
    //
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Factory|Application|Response|View
     */
    public function show(int $id){
        $empress = $id;
        $ratios=DB::table('balances')
            ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
            ->select('balances.fecha_inicio','balances.fecha_final')
            ->where('cuentas.empresas_id', $id)
            ->groupBy('balances.fecha_inicio','balances.fecha_final')
            ->get();
        return view('ratios.show', compact('ratios','empress'));
    }
    /**
     * Display the specified resource.
     *
     * @param int $id
     * @param $request
     * @return Factory|Application|Response|View
     */
    public function show1($id){
        //$fecha = $id;
        //$str_arr = preg_split("/\|/", $id);
        //$id = $str_arr[0];
        //$inicio = $str_arr[1];
        //$final = $str_arr[2];
        $emp = $id ;
        $inicio = Input :: get ( 'fecha_inicial' );
        $final = Input :: get ( 'fecha_final' );

        $ratiosInicio = $inicio;
        $ratiosFinal = $final;
        //RAZONES FINANCIERAS DE LIQUIDEZ
        $RazonCirculante = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "PASIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RazonCirculante', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('RazonCirculante');
        $RC = $this->converter($RazonCirculante);
        $PruebaAcida = DB::table('balances')
            ->selectRaw(
                '((select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) -
                (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "INVENT%" 
                and fecha_inicio = ? 
                and fecha_final = ?)) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "PASIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as PruebaAcida', [$id, $inicio, $final, $id, $inicio, $final
                    , $id, $inicio, $final]
            )
            ->get('PruebaAcida');
        $PA = $this->converter($PruebaAcida);
        $CapitalTrabajo = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) - (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "PASIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as CapitalTrabajo', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('CapitalTrabajo');
        $CT = $this->converter($CapitalTrabajo);
        $RazonCapitalTrabajo = DB::table('balances')
            ->selectRaw(
                '((select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) - (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "PASIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)) / (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RazonCapitalTrabajo', [$id, $inicio, $final, $id, $inicio, $final
                    , $id, $inicio, $final]
            )
            ->get('RazonCapitalTrabajo');
        $RCT = $this->converter($RazonCapitalTrabajo);
        $RazonEfectivo = DB::table('balances')
            ->selectRaw(
                '((select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "EFECTIV%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) -
                (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "VALORES CORTO PLAZO" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "PASIVO C%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RazonEfectivo', [$id, $inicio, $final, $id, $inicio, $final
                    , $id, $inicio, $final]
            )
            ->get('RazonEfectivo');
        $RE = $this->converter($RazonEfectivo);
        //RAZONES FINANCIERAS DE EFICIENCIA
        $RazonRotacionInv = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "COSTO% VENTA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (((select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "INVENTARIO%" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "INVENTARIO%" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as RazonRotacionInv', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('RazonRotacionInv');
        $RRI = $this->converter($RazonRotacionInv);
        $RazonDiasInv = DB::table('balances')
            ->selectRaw(
                '( ( (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "INVENTARIO%" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "INVENTARIO%" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "COSTO% VENTA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) * 365
                as RazonDiasInv', [$id, $inicio, $inicio, $id, $final, $final, $id, $inicio, $final]
            )
            ->get('RazonDiasInv');
        $RDI = $this->converter($RazonDiasInv);
        $RazonRotacionCobros = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "VENTA% NETA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / ( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% COBRAR" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% COBRAR" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as RazonRotacionCobros', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('RazonRotacionCobros');
        $RRC = $this->converter($RazonRotacionCobros);
        $RazonPeriodoMedioCobranza = DB::table('balances')
            ->selectRaw(
                '( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% COBRAR" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% COBRAR" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "VENTA% NETA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) * 365
                as RazonPeriodoMedioCobranza', [$id, $inicio, $inicio, $id, $final, $final, $id, $inicio, $final]
            )
            ->get('RazonPeriodoMedioCobranza');
        $RPMC = $this->converter($RazonPeriodoMedioCobranza);
        $RazonRotacionPagos = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "COMPRA%"
                and fecha_inicio >= ? 
                and fecha_final <= ?) / ( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% PAGAR" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% PAGAR" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as RazonRotacionPagos', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('RazonRotacionPagos');
        $RRP = $this->converter($RazonRotacionPagos);
        $RazonPeriodoMedioPago = DB::table('balances')
            ->selectRaw(
                '( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% PAGAR" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "CUENTA% PAGAR" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "COMPRA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) * 365
                as RazonPeriodoMedioPago', [$id, $inicio, $inicio, $id, $final, $final, $id, $inicio, $final]
            )
            ->get('RazonPeriodoMedioPago');
        $RPMP = $this->converter($RazonPeriodoMedioPago);
        $IndiceRotacionActivosTotales = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "VENTA% NETA%"
                and fecha_inicio >= ? 
                and fecha_final <= ?) / ( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO%" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO%" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as IndiceRotacionActivosTotales', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('IndiceRotacionActivosTotales');
        $IRAT = $this->converter($IndiceRotacionActivosTotales);
        $IndiceRotacionActivosFijos = DB::table('balances')
            ->selectRaw(
                '(select monto from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "VENTA% NETA%"
                and fecha_inicio = ? 
                and fecha_final = ?) / ( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO% FIJO%" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO% FIJO%" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as IndiceRotacionActivosFijos', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('IndiceRotacionActivosFijos');
        $IRAF = $this->converter($IndiceRotacionActivosFijos);
        $IndiceMargenBruto = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% BRUTA%"
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "VENTA%"
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as IndiceMargenBruto', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('IndiceMargenBruto');
        $IMB = $this->converter($IndiceMargenBruto);
        $IndiceMargenOperativo = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% OPERATIVA%"
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "VENTA%"
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as IndiceMargenOperativo', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('IndiceMargenOperativo');
        $IMO = $this->converter($IndiceMargenOperativo);
        //RAZONES FINANCIERAS DE APALNCAMIENTO
        $GradoEndeudamiento = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "PASIVO%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "ACTIVO%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as GradoEndeudamiento', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('GradoEndeudamiento');
        $GE = $this->converter($GradoEndeudamiento);
        $GradoPropiedad = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "PATRIMONIO" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "ACTIVO%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as GradoPropiedad', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('GradoPropiedad');
        $GP = $this->converter($GradoPropiedad);
        $RazonEndeudamientoPatrimonio = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "PASIVO" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "PATRIMONIO" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RazonEndeudamientoPatrimonio', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('RazonEndeudamientoPatrimonio');
        $REP = $this->converter($RazonEndeudamientoPatrimonio);
        $RazonCoberturaGastosFinancieros = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% ANTES DE% IMPUESTO%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "GASTO% FINANCIERO%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RazonCoberturaGastosFinancieros', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('RazonCoberturaGastosFinancieros');
        $RCGF = $this->converter($RazonCoberturaGastosFinancieros);
        //RAZONES FINANCIERAS DE RENTABILIDAD
        $RentabilidadNetaPatrimonio = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% NETA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / ( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "PATRIMONIO" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "PATRIMONIO" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as RentabilidadNetaPatrimonio', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('RentabilidadNetaPatrimonio');
        $RNP = $this->converter($RentabilidadNetaPatrimonio);
        $RentabilidadNetaPorAccion = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% NETA%" 
                and fecha_inicio <= ? 
                and fecha_final >= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "NUMERO% ACCIONES%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RentabilidadNetaPorAccion', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('RentabilidadNetaPorAccion');
        $RPA = $this->converter($RentabilidadNetaPorAccion);
        $RentabilidadNetaDelActivo = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% NETA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / ( ( (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO" 
                and fecha_inicio >= ? 
                and fecha_final <= adddate(?, 365)) + (select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "ACTIVO" 
                and fecha_inicio >= subdate(?, 365) 
                and fecha_final <= ?)) / 2)
                as RentabilidadNetaDelActivo', [$id, $inicio, $final, $id, $inicio, $inicio, $id, $final, $final]
            )
            ->get('RentabilidadNetaDelActivo');
        $RDA = $this->converter($RentabilidadNetaDelActivo);
        $RentabilidadSobreVentas = DB::table('balances')
            ->selectRaw(
                '(select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "UTILIDAD% NETA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "VENTA%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RentabilidadSobreVentas', [$id, $inicio, $final, $id, $inicio, $final]
            )
            ->get('RentabilidadSobreVentas');
        $RSV = $this->converter($RentabilidadSobreVentas);
        $RentabilidadSobreInversion = DB::table('balances')
            ->selectRaw(
                '((select sum(monto) from balances inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? 
                and cuentas.nombre like "INGRESO%" 
                and fecha_inicio >= ? 
                and fecha_final <= ?) - (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "INVERSION%"
                and fecha_inicio >= ? 
                and fecha_final <= ?)) / (select sum(monto) from balances 
                inner join cuentas on cuentas.id = balances.cuentas_id 
                where cuentas.empresas_id = ? and cuentas.nombre like "INVERSION%"
                and fecha_inicio >= ? 
                and fecha_final <= ?)
                as RentabilidadSobreInversion', [$id, $inicio, $final, $id, $inicio, $final
                    , $id, $inicio, $final]
            )
            ->get('RentabilidadSobreInversion');
        $RSI = $this->converter($RentabilidadSobreInversion);
        dd($RC,$PA,$CT,$RCT,$RE,$RRI,$RDI,$RRC,$RPMC,$RRP,$RPMP,$IRAT,$IRAF,$IMB,$IMO,$GE,$GP,$REP,$RCGF,$RNP,$RPA,$RDA,$RSV,$RSI);
        return view('ratios.show1', [
            "ratiosInicio"=>$ratiosInicio,
            "ratiosFinal"=>$ratiosFinal,
            "RC"=>$RC->RazonCirculante, "PA"=>$PA->PruebaAcida, "CT"=>$CT->CapitalTrabajo, "RCT"=>$RCT->RazonCapitalTrabajo, "RE"=>$RE->RazonEfectivo,
            "RRI"=>$RRI->RazonRotacionInv, "RDI"=>$RDI->RazonDiasInv,
            "RRC"=>$RRC->RazonRotacionCobros, "RPMC"=>$RPMC->RazonPeriodoMedioCobranza,
            "RRP"=>$RRP->RazonRotacionPagos, "RPMP"=>$RPMP->RazonPeriodoMedioPago,
            "IRAT"=>$IRAT->IndiceRotacionActivosTotales, "IRAF"=>$IRAF->IndiceROtacionActivosFijos,
            "IMB"=>$IMB->IndiceMargenBruto, "IMO"=>$IMO->IndiceMargenOperativo,
            "GE"=>$GE->GradoEndeudamiento, "GP"=>$GP->GradoPropiedad,
            "REP"=>$REP->RazonEndeudamientoPatrimonio, "RCGF"=>$RCGF->RazonCoberturaGastosFinancieros,
            "RNP"=>$RNP->RentabilidadNetaPatrimonio, "RPA"=>$RPA->RentabilidadNetaPorAccion,
            "RDA"=>$RPA->RentabilidadNetaDelActivo, "RSV"=>$RSV->RentabilidadSobreVentas,
            "RSI"=>$RSI->RentabilidadSobreInversion
        ]);
    }
    //CONVERTIDOR
    public function converter($obj){
        foreach ($obj as $monto) return $monto;
    }
}
