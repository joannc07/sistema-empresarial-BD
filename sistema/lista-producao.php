<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

// comando SQL que sera executado no banco
$sql = "SELECT pp.ProducaoID, p.Nome as nome_produto, C.nome as nome_cliente, pp.DataEntrega, pp.DataProducao
        FROM producao as pp
        INNER JOIN produtos as p ON pp.ProdutoID = p.ProdutoID
        INNER JOIN clientes as c ON pp.ClienteID = c.ClienteID";
// dataresult da execucao do SQL no banco
$resultado = mysqli_query($conn,$sql);
?>
  <main>

    <div class="container">
        <h1>Lista de Produção</h1>
        <a href="./salvar-producao.php" class="btn btn-add">Incluir</a>
        <table>
          <thead>
            <tr>
              <th>ID</th>
              <th>Produto</th>
              <th>Cliente</th>
              <th>Data</th>
              <th>Ações</th>
            </tr>
          </thead>
          <tbody>
            <?php
            //
            while ( $dado = mysqli_fetch_assoc($resultado)) {
            ?>
            <tr>
              <td><?php echo $dado['ProducaoID'];?></td>
              <td><?php echo $dado['nome_produto'];?></td>
              <td><?php echo $dado['nome_cliente'];?></td>
              <td><?php echo $dado['DataProducao'];?></td>
              <td>
                <a href="#" class="btn btn-edit">Editar</a>
                <a href="#" class="btn btn-delete">Excluir</a>
              </td>
            </tr>
            <?php
            }
            ?>
            
          </tbody>
        </table>
      </div> 
  </main>
  
  <?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>