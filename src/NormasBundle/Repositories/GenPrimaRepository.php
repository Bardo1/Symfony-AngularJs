<?php

namespace NormasBundle\Repositories;

use Doctrine\ORM\EntityRepository;
use Doctrine\ORM\EntityManager;

/**
 * GenPrimaRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class GenPrimaRepository extends EntityRepository
{


	public function ssssss(){
	        return 1; 
	}
    
    

    public function listaPrimas(){
     
            $query = "
			SELECT 
			a.id as id,
			a.descripcion as tipoPrima,
			gb.nombrebeneficiario as nombreBeneficiario,
            a.moneda as moneda,
            gr.nombre as rubro,
            a.tipoValor as tipoValor,
            a.valor1 as valor1,
            a.valor2 as valor2,
            a.rutBeneficiario as rutbeneficiario,
            a.activo as activo
			FROM NormasBundle\Entity\GenPrima a
			LEFT JOIN NormasBundle\Entity\GenBeneficiario gb with (a.rutBeneficiario = gb.rutbeneficiario)
			INNER JOIN NormasBundle\Entity\GenRubro gr WITH (a.idGenRubro = gr.id)
			group by
			a.id, 
			a.descripcion, 
			gb.nombrebeneficiario, 
            a.moneda, 
            gr.nombre, 
            a.tipoValor, 
            a.valor1, 
            a.valor2, 
            a.rutBeneficiario, 
            a.activo";

			$query = $this->_em->createQuery($query);
			//echo'<pre>';var_dump($query->getArrayResult());exit;
			return $query->getArrayResult(); 
    }

}
