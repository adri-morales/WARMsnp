<?php 
session_start();

if ($_REQUEST) {
	$_SESSION['gene_page'] = $_REQUEST;
} 
?>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<link rel="stylesheet" type="text/css" href="scss/custom.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.2/jquery.min.js"></script>
	<script src="http://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.2/modernizr.js"></script>


    <link rel="stylesheet" href="DataTable/jquery.dataTables.min.css"/>
    <script type="text/javascript" src="DataTable/jquery-2.2.0.min.js"></script>
    <script type="text/javascript" src="DataTable/jquery.dataTables.min.js"></script>

	<link rel="icon" href="Home_images/flame.png">
	<title><?php  print $_SESSION['gene_page']['ref'] ?></title>
</head>

<?php 


include "navbar.html";				#incluimos la barra de navegación y el head de la pagina
include 'databasecon.php';			#incluimos la página en la que nos conectamos con la base de datos 



$sql_GO = "select GO.GO_name, GO.GO_id
from GO, Gene_Go as gg, Gene as g
where gg.GO_id = GO.GO_id and gg.Gene_id = g.Gene_id and 
g.Gene_id like '".$_REQUEST['ref']."'";

print $sql_GO;

$sql_tissue = "select t.name, gt.expression_level
from tissue as t, Gene_Tissue as gt, Gene as g
where  g.Gene_id = gt.idGene and expression_level > 0 and t.Tissue_id = gt.Tissue_id
and g.Gene_id like '".$_REQUEST['ref']."'
order by gt.expression_level desc";


$sql_gene = "select g.Gene_id, Chromosome, Start_position, End_position,
hgnc_name
from 	Gene as g
where	g.Gene_id like '".$_REQUEST['ref']."'";

$sql_snp = "select s.idSNP, pos, Main_allele,
Frequency, Sequence, p_value, beta, predicted_consequences
from 	SNP as s, Variants as v, Gene as g, Gene_has_SNP as gs
where	v.idSNP = s.idSNP and g.Gene_id = gs.Gene_Gene_id and 
s.idSNP = gs.SNP_idSNP and g.Gene_id like '".$_REQUEST['ref']."'";


$rs_GO = mysqli_query($mysqli, $sql_GO) or print "GO: ".mysqli_error($mysqli);
$rs_tissue = mysqli_query($mysqli, $sql_tissue) or print "Tissue: ".mysqli_error($mysqli);
$rs_gene = mysqli_query($mysqli, $sql_gene) or print "Gene: ".mysqli_error($mysqli); 
$rs_snp = mysqli_query($mysqli, $sql_snp) or print "SNP: ".mysqli_error($mysqli);

function transpose($data)
{
	$retData = array();
	foreach ($data as $row => $columns) {
		foreach ($columns as $row2 => $column2) {
			$retData[$row2][$row] = $column2;
		}
	}
	return $retData;
}

$rsT_gene = mysqli_fetch_assoc($rs_gene);

if (is_null($rsT['chr'])){
	$rsT['chr'] = $rsT_gene['Chromosome'][0];
}

?>

<div class="container" style="padding-top: 25px">
	<div>
		
		<h3 style="margin-right: 10px">Gene: <?php print $rsT_gene['hgnc_name'] ?><span class=""> <a target="_blank" href="<?php print "https://www.ensembl.org/Homo_sapiens/Location/View?db=core;g=".$_SESSION['gene_page']['ref'].";r=".$rsT['chr'].":".$rsT_gene['Start_position']."-".$rsT_gene['End_position'] ?>" ><?php print $_SESSION['gene_page']['ref'] ?></a></span> </h3>
		
		<div class="row">
			<p>
				<a  target="_blank" href="<?php print "https://www.ensembl.org/Homo_sapiens/Location/View?db=core;g=".$_SESSION['gene_page']['ref'].";r=".$rsT['chr'].":".$rsT_gene['Start_position']."-".$rsT_gene['End_position'] ?>" >
					Location: chr: <?php print $rsT['chr']." : ".$rsT_gene['Start_position']." : ".$rsT_gene['End_position']?>

				</a></p>


			</div>

			<div>
				<p>GO: <?php 
				$link_array = [];
				while ($rsT_Go = mysqli_fetch_assoc($rs_GO)){
				$link_array[] = "<a target='_blank' href ='http://amigo.geneontology.org/amigo/term/".$rsT_Go['GO_id']."'>".$rsT_Go['GO_name']."</a>";
				}

				print implode(", ", $link_array);
				?></p>

			</div>

			<div class="container">

				<table border="0" cellspacing="2" cellpadding="4" id="tissueTable">
					<thead>
						<tr>
							<th>Tissue</th>
							<th>Expression level (tpm)</th>
						</tr>
					</thead>
					<tbody>

						<?php 

						while ($rsT_tissue = mysqli_fetch_assoc($rs_tissue)) {

							?><tr><?php 
							foreach ($rsT_tissue as $field) {

								?>

								<td><?php print $field ?></td>

								<?php 
							}
							?><tr><?php 
						}

						?>

					</tbody>
				</table>

			</div>


			<div class="container">

				<table border="0" cellspacing="2" cellpadding="4" id="blastTable">
					<thead>
						<tr>
							<th>SNP Id</th>
							<th>Position</th>
							<th>Main allele</th>
							<th>Mutation</th>
							<th>Variant frequency</th>
							<th>Beta</th>
							<th>p value</th>
						</tr>
					</thead>
					<tbody>

						<?php while ($rsF = mysqli_fetch_assoc($rs_snp)) {

							$SNP_id =  $rsF['idSNP'];
							$Main_allele =  $rsF['Main_allele'];
							$variant_allele =  $rsF['Sequence'];
							$position = $rsF['pos'];
							$frequency = $rsF['Frequency'];
							$beta = $rsF['beta'];
							$pval = $rsF['p_value'];

							?>
							<tr>
								<?php  print "<td><a target='_blank' href='SNP_page.php?ref=$SNP_id'>   $SNP_id  </a></td>" ?>
								<td> <?php print $position ?> </td>
								<td> <?php print $Main_allele ?> </td>
								<td> <?php print $variant_allele ?> </td>
								<td> <?php print $frequency ?> </td>
								<td> <?php print $beta ?> </td>
								<td> <?php print $pval ?> </td>
							</tr>
							<?php
						}

						?>
					</tbody>
				</table>			

			</div>

			







		</div>
	</div>



<!-- 
si seleccionamso snp 40000 arrgiba y abajo con p-value beta value, posiciones. 
3 arrays asociativos en el que la clave sea el id del snp
-->


<script type="text/javascript">
	$(document).ready(function () {
		$('#blastTable').DataTable();
		$('#tissueTable').DataTable();
	});
</script>



<?php 



 #DATOS PARA RAMON

$sql_plot1 = "select pos, beta, v.p_value, s.idSNP
from 	SNP as s, Variants as v, Gene_has_SNP as gs, Gene as g
where	s.pos between ".$rsT['pos']."-40000 and ".$rsT['pos']."+40000
and chr = ".$rsT['chr']."  and s.idSNP = v.idSNP;";

$sql_plot2 = "select pos, beta, p_value, s.idSNP
from 	SNP as s, Variants as v, Gene_has_SNP as gs, Gene as g
where	s.pos between ".$rsT['pos']."-40000 and ".$rsT['pos']."+40000
and Chromosome = ".$rsT['chr']." and s.idSNP = v.idSNP and 
s.idSNP = gs.SNP_idSNP and g.Gene_id = gs.Gene_Gene_id;";


$rs_plot1 = mysqli_query($mysqli, $sql_plot1) or print mysqli_error($mysqli);
$rs_plot2 = mysqli_query($mysqli, $sql_plot2) or print mysqli_error($mysqli);

$rsT_plot = mysqli_fetch_all($rs_plot1,MYSQLI_ASSOC);

$rsT_plot += mysqli_fetch_all($rs_plot2,MYSQLI_ASSOC);



function cmp($a, $b)
{
	if ($a["pos"] == $b["pos"]) {
		return 0;
	}
	return ($a["pos"] < $b["pos"]) ? -1 : 1;
}

usort($rsT_plot,"cmp");

$rsT_plot = transpose($rsT_plot);



?>

<?php
include "footer.html";
?>
</body>
</html>
