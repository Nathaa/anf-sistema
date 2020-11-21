<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Balance;
use Illuminate\Support\Facades\Input;
use Session;

class RatiosController extends Controller
{
    //

     /**
     * Display the specified resource. 
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
     
     $empress=($id);
    // dd($empress);

      $balances=DB::table('balances')
      ->join('cuentas','cuentas.id','=', 'balances.cuentas_id')
      ->select('balances.fecha_inicio','balances.fecha_final')
      ->where('cuentas.empresas_id', $id)
      ->groupBy('balances.fecha_inicio','balances.fecha_final')
      ->get();

          return view('ratios.show',compact('balances','empress'));
    }

    public function show1($id)
    {
        
      $emp = $id;
      $fini = Input::get('fecha_inicial');
      $ffin = Input::get('fecha_final');
      setlocale(LC_TIME, "spanish");
      $mesanio1 = date("F",strtotime($fini)).' '.date("Y",strtotime($fini));       
      $mesanio2 = date("F",strtotime($ffin)).' '.date("Y",strtotime($ffin));  
      $anio = date("Y",strtotime($ffin)) - date("Y",strtotime($fini));

     
       
      
      $ratiosl=DB::select("select 'Razón de Circulante' nombre, round(b.monto/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) *100,2) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        union
                        select 'Prueba Acida' nombre, round((b.monto-(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='Inventarios' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                    ) *100,2) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Activo Neto' nombre, round((b.monto-(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='PASIVO CORRIENTE' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='ACTIVO' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                ) *100 ,2) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Efectivo' nombre, round((b.monto+(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='VALORES DE CORTO PLAZO' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
            ) *100,2) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='EFECTIVO'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'");

        $ratiosl2=DB::select("select 'Razón de Circulante' nombre, round(b.monto/(select a.monto 
                        from balances a , cuentas d
                    where a.nombre='PASIVO CORRIENTE' 
                    and a.cuentas_id =d.id
                    and d.empresas_id=c.empresas_id
                    and a.fecha_inicio = b.fecha_inicio
                    and a.fecha_final=b.fecha_final
                    ) *100,2) resultado
                    from balances b, cuentas c
                    where  b.cuentas_id=c.id
                    and b.nombre='ACTIVO CORRIENTE'
                    and c.empresas_id=".$emp."
                    and b.fecha_final ='".$ffin."'
                    union
                    select 'Prueba Acida' nombre, round((b.monto-(select a.monto 
                                                            from balances a , cuentas d
                                                        where a.nombre='Inventarios' 
                                                        and a.cuentas_id =d.id
                                                        and d.empresas_id=c.empresas_id
                                                        and a.fecha_inicio = b.fecha_inicio
                                                        and a.fecha_final=b.fecha_final))/(select a.monto 
                        from balances a , cuentas d
                    where a.nombre='PASIVO CORRIENTE' 
                    and a.cuentas_id =d.id
                    and d.empresas_id=c.empresas_id
                    and a.fecha_inicio = b.fecha_inicio
                    and a.fecha_final=b.fecha_final
                    ) *100,2) resultado
                    from balances b, cuentas c
                    where  b.cuentas_id=c.id
                    and b.nombre='ACTIVO CORRIENTE'
                    and c.empresas_id=".$emp."
                    and b.fecha_final ='".$ffin."'
                    UNION
                        select 'Razón de Activo Neto' nombre, round((b.monto-(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='PASIVO CORRIENTE' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='ACTIVO' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) *100 ,2) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='ACTIVO CORRIENTE'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Razón de Efectivo' nombre, round((b.monto+(select a.monto 
                                                                from balances a , cuentas d
                                                            where a.nombre='VALORES DE CORTO PLAZO' 
                                                            and a.cuentas_id =d.id
                                                            and d.empresas_id=c.empresas_id
                                                            and a.fecha_inicio = b.fecha_inicio
                                                            and a.fecha_final=b.fecha_final))/(select a.monto 
                            from balances a , cuentas d
                        where a.nombre='PASIVO CORRIENTE' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) *100,2) resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='EFECTIVO'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'");

        // aqui ira calculo de ratios     
        $ratios=DB::select("select 'Razón de Rotación de Inventario' nombre, round(b.monto/(select a.monto 
                                from balances a , cuentas d
                            where a.nombre='INVENTARIOS' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                       ),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='COSTO DE VENTAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        union  
                        select 'Razón de Dias de Inventario' nombre, round(b.monto/((select a.monto 
                                from resultados a , cuentas d
                            where a.nombre='COSTO DE VENTAS' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            )/365),2)  resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='INVENTARIOS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        union  
                        select 'Razón de Rotación CXC' nombre, round(b.monto/(select a.monto 
                                        from balances a , cuentas d
                                    where a.nombre='Cuentas por cobrar' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
                    ),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='VENTAS NETAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Rotación de cuentas por pagar ' nombre, round(b.monto/(select a.monto 
                                        from balances a , cuentas d
                                    where a.nombre='Cuentas por pagar comerciales' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
                ),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='COSTO DE VENTAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Indice de Rotación de Activos Totales' nombre, round(b.monto/(select a.monto 
                                        from balances a , cuentas d
                                    where a.nombre='ACTIVO' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
            ),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='VENTAS NETAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Indice de Rotación de Activos Fijos' nombre, round(b.monto/(select a.monto 
                                        from balances a , cuentas d
                                    where a.nombre='Activo Fijo Neto' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
        ),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='VENTAS NETAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Indice de Margen Bruto' nombre, round(b.monto/(select a.monto 
                                        from resultados a , cuentas d
                                    where a.nombre='VENTAS NETAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
    ),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='UTILIDAD BRUTA'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Indice de Margen Operativo' nombre, round(b.monto/(select a.monto 
                                        from resultados a , cuentas d
                                    where a.nombre='VENTAS NETAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='UTILIDAD DE OPERACION'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Periodo medio de cobranza ' nombre, round(b.monto*365/(select a.monto 
                                        from resultados a , cuentas d
                                    where a.nombre='VENTAS NETAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
),2)  resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='Cuentas por cobrar'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Periodo medio de pago' nombre, ROUND(b.monto*365/(select a.monto 
                                        from resultados a , cuentas d
                                    where a.nombre='COSTO DE VENTAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
),2)  resultado
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='Cuentas por pagar comerciales'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'");


            $ratios2=DB::select("select 'Razón de Rotación de Inventario' nombre, round(b.monto/(select sum(a.monto)/2 
                                    from balances a , cuentas d
                                where a.nombre='INVENTARIOS' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                ) ,2) resultado
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='COSTO DE VENTAS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final  ='".$ffin."'
                            union  
                            select 'Razón de Dias de Inventario ' nombre, round((b.monto+e.monto)/2/(select a.monto/365 
                                        from resultados a , cuentas d
                                    where a.nombre='COSTO DE VENTAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
),2)  resultado
                        from balances b
                        inner join cuentas c on (b.cuentas_id=c.id and b.nombre='INVENTARIOS' and c.empresas_id=".$emp.")
                        inner join balances e on (b.cuentas_id = e.cuentas_id and e.nombre='INVENTARIOS' and c.empresas_id=".$emp." and e.fecha_final = DATE_ADD('".$ffin."', INTERVAL -12 MONTH))
                        and b.fecha_final ='".$ffin."'
                            union  
                            select 'Razón de Rotación CXC' nombre, round(b.monto/(select sum(a.monto)/2 
                                            from balances a , cuentas d
                                        where a.nombre='Cuentas por cobrar' 
                                        and a.cuentas_id =d.id
                                        and d.empresas_id=c.empresas_id
                                        and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                        ) ,2) resultado
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='VENTAS NETAS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final  ='".$ffin."'
                         UNION
                            select 'Razón de Rotación de cuentas por pagar ' nombre, round(b.monto/(select sum(a.monto)/2 
                                            from balances a , cuentas d
                                        where a.nombre='Cuentas por pagar comerciales' 
                                        and a.cuentas_id =d.id
                                        and d.empresas_id=c.empresas_id
                                        and ((a.fecha_inicio = b.fecha_inicio
                                        and a.fecha_final=b.fecha_final)
                                        or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                        and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
),2)  resultado
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='COSTO DE VENTAS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final  ='".$ffin."'
                          UNION
                            select 'Indice de Rotación de Activos Totales' nombre, round(b.monto/(select SUM(a.monto)/2 
                                            from balances a , cuentas d
                                        where a.nombre='ACTIVO' 
                                        and a.cuentas_id =d.id
                                        and d.empresas_id=c.empresas_id
                                        and ((a.fecha_inicio = b.fecha_inicio
                                        and a.fecha_final=b.fecha_final)
                                        or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                        and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
),2)  resultado
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='VENTAS NETAS'
                            and c.empresas_id=".$emp."
                            and b.fecha_final ='".$ffin."'
                            UNION
                        select 'Indice de Rotación de Activos Fijos' nombre, round(b.monto/(select SUM(a.monto)/2 
                                        from balances a , cuentas d
                                    where a.nombre='Activo Fijo Neto' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and ((a.fecha_inicio = b.fecha_inicio
                                        and a.fecha_final=b.fecha_final)
                                        or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                        and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='VENTAS NETAS'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Indice de Margen Bruto' nombre, round(b.monto/(select sum(a.monto)/2 
                                        from resultados a , cuentas d
                                    where a.nombre='VENTAS NETAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and ((a.fecha_inicio = b.fecha_inicio
                                        and a.fecha_final=b.fecha_final)
                                        or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                        and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                    ) ,2) resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='UTILIDAD BRUTA'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Indice de Margen Operativo' nombre, round(b.monto/(select sum(a.monto)/2 
                                        from resultados a , cuentas d
                                    where a.nombre='VENTAS NETAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and ((a.fecha_inicio = b.fecha_inicio
                                        and a.fecha_final=b.fecha_final)
                                        or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                        and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
),2)  resultado
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='UTILIDAD DE OPERACION'
                        and c.empresas_id=".$emp."
                        and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Razón de Periodo medio de cobranza ' nombre, round((b.monto+e.monto)/2*365/(select a.monto 
                                        from resultados a , cuentas d
                                    where a.nombre='VENTAS NETAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
),2)  resultado
                        from balances b
                        inner join cuentas c on (b.cuentas_id=c.id and b.nombre='Cuentas por cobrar' and c.empresas_id=".$emp.")
                        inner join balances e on (b.cuentas_id = e.cuentas_id and e.nombre='Cuentas por cobrar' and c.empresas_id=".$emp." and e.fecha_final = DATE_ADD('".$ffin."', INTERVAL -12 MONTH))
                        and b.fecha_final = '".$ffin."'
                        UNION
                        select 'Razón de Periodo medio de cobranza ' nombre, round((b.monto+e.monto)/2*365/(select a.monto 
                                        from resultados a , cuentas d
                                    where a.nombre='COSTO DE VENTAS' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and a.fecha_inicio = b.fecha_inicio
                                    and a.fecha_final=b.fecha_final
),2)  resultado
                        from balances b
                        inner join cuentas c on (b.cuentas_id=c.id and b.nombre='Cuentas por pagar comerciales' and c.empresas_id=".$emp.")
                        inner join balances e on (b.cuentas_id = e.cuentas_id and e.nombre='Cuentas por pagar comerciales' and c.empresas_id=".$emp." and e.fecha_final = DATE_ADD('".$ffin."', INTERVAL -12 MONTH))
                        and b.fecha_final = '".$ffin."'"); 
                            
        $ratiosr=DB::select("select 'Rentabilidad del Patrimonio (ROE)' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                                from balances a , cuentas d
                            where a.nombre='PATRIMONIO' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            )*100,2) resultado,c.empresas_id
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='UTILIDAD (PERDIDA) NETA'
                            and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Rentabilidad del Activo (ROA)' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                                from balances a , cuentas d
                            where a.nombre='ACTIVO' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            ) *100,2) resultado,c.empresas_id
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='UTILIDAD (PERDIDA) NETA'
                            and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Rentabilidad sobre ventas' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                                from resultados a , cuentas d
                            where a.nombre='VENTAS NETAS' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            )*100,2) resultado,c.empresas_id
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='UTILIDAD (PERDIDA) NETA'
                            and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Rentabilidad sobre inversion' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                                from resultados a , cuentas d
                            where a.nombre='COSTO DE VENTAS' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            )*100,2) resultado,c.empresas_id
                            from resultados b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='UTILIDAD BRUTA'
                            and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'");            
                 
               $ratiosr2=DB::select("select 'Rentabilidad del Patrimonio (ROE)' nombre, b.fecha_inicio,round(b.monto/(select sum(a.monto)/2
                                    from balances a , cuentas d
                                where a.nombre='PATRIMONIO' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                )*100,2) resultado,c.empresas_id
                                from resultados b, cuentas c
                                where  b.cuentas_id=c.id
                                and b.nombre='UTILIDAD (PERDIDA) NETA'
                                and c.empresas_id=".$emp."
                                and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Rentabilidad del Activo (ROA)' nombre, b.fecha_inicio,round(b.monto/(select sum(a.monto)/2
                                    from balances a , cuentas d
                                where a.nombre='ACTIVO' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                ) *100,2) resultado,c.empresas_id
                                from resultados b, cuentas c
                                where  b.cuentas_id=c.id
                                and b.nombre='UTILIDAD (PERDIDA) NETA'
                                and c.empresas_id=".$emp."
                                and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Rentabilidad sobre ventas' nombre, b.fecha_inicio,round(b.monto/(select SUM(a.monto)/2
                                    from resultados a , cuentas d
                                where a.nombre='VENTAS NETAS' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                )*100,2) resultado,c.empresas_id
                                from resultados b, cuentas c
                                where  b.cuentas_id=c.id
                                and b.nombre='UTILIDAD (PERDIDA) NETA'
                                and c.empresas_id=".$emp."
                                and b.fecha_final ='".$ffin."'
                        UNION
                        select 'Rentabilidad sobre inversion' nombre, b.fecha_inicio,round(b.monto/(select SUM(a.monto)/2
                                    from resultados a , cuentas d
                                where a.nombre='COSTO DE VENTAS' 
                                and a.cuentas_id =d.id
                                and d.empresas_id=c.empresas_id
                                and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                )*100,2) resultado,c.empresas_id
                                from resultados b, cuentas c
                                where  b.cuentas_id=c.id
                                and b.nombre='UTILIDAD BRUTA'
                                and c.empresas_id=".$emp."
                                and b.fecha_final ='".$ffin."'");     
                                
            $ratiose=DB::select("select 'Grado de endeudamiento' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                                from balances a , cuentas d
                            where a.nombre='ACTIVO' 
                            and a.cuentas_id =d.id
                            and d.empresas_id=c.empresas_id
                            and a.fecha_inicio = b.fecha_inicio
                            and a.fecha_final=b.fecha_final
                            ) *100,2) resultado,c.empresas_id
                            from balances b, cuentas c
                            where  b.cuentas_id=c.id
                            and b.nombre='PASIVO'
                            and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Grado de Propiedad' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                            from balances a , cuentas d
                        where a.nombre='ACTIVO' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) *100,2) resultado,c.empresas_id
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='PATRIMONIO'
                        and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'
                        UNION
                        Select 'Razón de Endeudamiento Pat.' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                            from balances a , cuentas d
                        where a.nombre='PASIVO' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) *100,2) resultado,c.empresas_id
                        from balances b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='PATRIMONIO'
                        and c.empresas_id=".$emp."
                            and b.fecha_inicio ='".$fini."'
                        UNION
                        select 'Razón de Cobertura de Gastos Financieros' nombre, b.fecha_inicio,round(b.monto/(select a.monto
                            from resultados a , cuentas d
                        where a.nombre='GASTOS DE ADMINISTRACION' 
                        and a.cuentas_id =d.id
                        and d.empresas_id=c.empresas_id
                        and a.fecha_inicio = b.fecha_inicio
                        and a.fecha_final=b.fecha_final
                        ) *100,2) resultado,c.empresas_id
                        from resultados b, cuentas c
                        where  b.cuentas_id=c.id
                        and b.nombre='UTILIDADES ANTES DE PART E IMP'
                        and c.empresas_id=".$emp."
                        and b.fecha_inicio ='".$fini."'"); 
                        
                 $ratiose2=DB::select("select 'Grado de endeudamiento' nombre, b.fecha_inicio,round(b.monto/(select SUM(a.monto)/2
                                     from balances a , cuentas d
                                 where a.nombre='ACTIVO' 
                                 and a.cuentas_id =d.id
                                 and d.empresas_id=c.empresas_id
                                 and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                 ) *100,2) resultado,c.empresas_id
                                 from balances b, cuentas c
                                 where  b.cuentas_id=c.id
                                 and b.nombre='PASIVO'
                                        and c.empresas_id=".$emp."
                                        and b.fecha_final ='".$ffin."'
                                    UNION
                                    select 'Grado de Propiedad' nombre, b.fecha_inicio,round(b.monto/(select sum(a.monto)/2
                                        from balances a , cuentas d
                                    where a.nombre='ACTIVO' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                    ) *100,2) resultado,c.empresas_id
                                    from balances b, cuentas c
                                    where  b.cuentas_id=c.id
                                    and b.nombre='PATRIMONIO'
                                    and c.empresas_id=".$emp."
                                    and b.fecha_final ='".$ffin."'
                                    UNION
                                    Select 'Razón de Endeudamiento Pat.' nombre, b.fecha_inicio,round(b.monto/(select sum(a.monto)/2
                                        from balances a , cuentas d
                                    where a.nombre='PASIVO' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                    ) *100,2) resultado,c.empresas_id
                                    from balances b, cuentas c
                                    where  b.cuentas_id=c.id
                                    and b.nombre='PATRIMONIO'
                                    and c.empresas_id=".$emp."
                                    and b.fecha_final ='".$ffin."'
                                    UNION
                                    select 'Razón de Cobertura de Gastos Financieros' nombre, b.fecha_inicio,round(b.monto/(select sum(a.monto)/2
                                        from resultados a , cuentas d
                                    where a.nombre='GASTOS DE ADMINISTRACION' 
                                    and a.cuentas_id =d.id
                                    and d.empresas_id=c.empresas_id
                                    and ((a.fecha_inicio = b.fecha_inicio
                                and a.fecha_final=b.fecha_final)
                                or (a.fecha_inicio = DATE_ADD(b.fecha_inicio, INTERVAL -12 MONTH)
                                and a.fecha_final=DATE_ADD(b.fecha_final, INTERVAL -12 MONTH)))
                                    ) *100,2) resultado,c.empresas_id
                                    from resultados b, cuentas c
                                    where  b.cuentas_id=c.id
                                    and b.nombre='UTILIDADES ANTES DE PART E IMP'
                                    and c.empresas_id=".$emp."
                                    and b.fecha_final ='".$ffin."'");          
        
       DB::select('CALL ratios(?,?,?)',[$emp,$fini,$ffin]);                                     
        return view('ratios.show1',compact('ratiosl','ratiosl2','ratios','ratios2','ratiosr','ratiosr2','ratiose','ratiose2','mesanio1','mesanio2','empress','anio'));
    }

}
