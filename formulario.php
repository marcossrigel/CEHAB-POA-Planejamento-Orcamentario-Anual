<?php
if (isset($_POST['submit'])) {

  $erros = [];

  function campoInvalido($valor) {
    return $valor === 'Selecione...';
  }

  if (campoInvalido($_POST['tema_custo'])) $erros[] = "Tema de Custo é obrigatório.";
  if (campoInvalido($_POST['setor_responsavel'])) $erros[] = "Setor Responsável é obrigatório.";
  if (campoInvalido($_POST['status_contrato'])) $erros[] = "Status do Contrato é obrigatório.";
  if (campoInvalido($_POST['dea'])) $erros[] = "DEA é obrigatório.";
  if (campoInvalido($_POST['reajuste'])) $erros[] = "Reajuste é obrigatório.";
  if (campoInvalido($_POST['fonte'])) $erros[] = "Fonte é obrigatória.";
  if (campoInvalido($_POST['grupo'])) $erros[] = "Grupo é obrigatório.";
  if (campoInvalido($_POST['acao'])) $erros[] = "Ação é obrigatória.";
  if (campoInvalido($_POST['sub_acao'])) $erros[] = "Sub-Ação é obrigatória.";
  if (campoInvalido($_POST['ficha_financeira'])) $erros[] = "Ficha Financeira é obrigatória.";
  if (campoInvalido($_POST['macro_tema'])) $erros[] = "Macro Tema é obrigatório.";
  if (campoInvalido($_POST['grau_priorizacao'])) $erros[] = "Grau de Priorização é obrigatório.";

  if (count($erros) > 0) {
    foreach ($erros as $erro) {
      echo "<p style='color: red;'>$erro</p>";
    }
    echo '<a href="formulario.php">Voltar</a>';
    exit;
  }
  else {

    include_once('config.php');

    $TemaCusto = $_POST['tema_custo'];
    $SetorResponsavel = $_POST['setor_responsavel'];
    $GestorResponsavel = $_POST['gestor_responsavel'];
    $Status = $_POST['status_contrato'];
    $NumeroContrato = $_POST['numero_contrato'];
    $NomeCredor = $_POST['nome_credor'];
    $Vigencia = $_POST['vigencia'];
    $DEA = $_POST['dea'];
    $Reajuste = $_POST['reajuste'];
    $Fonte = $_POST['fonte'];
    $Grupo = $_POST['grupo'];
    $ObjetoAtividade = $_POST['objeto_atividade'];
    $Acao = $_POST['acao'];
    $SubAcao = $_POST['sub_acao'];
    $FichaFinanceira = $_POST['ficha_financeira'];
    $MacroTema = $_POST['macro_tema'];
    $GrauPriorizacao = $_POST['grau_priorizacao'];

    $result = mysqli_query($conexao, "INSERT INTO formulariopoa(
      tema_custo, setor_responsavel, gestor_responsavel, status_contrato, numero_contrato,
      nome_credor, vigencia, dea, reajuste, fonte, grupo, objeto_atividade, acao, sub_acao,
      ficha_financeira, macro_tema, grau_priorizacao
    ) VALUES (
      '$TemaCusto', '$SetorResponsavel', '$GestorResponsavel', '$Status', '$NumeroContrato',
      '$NomeCredor', '$Vigencia', '$DEA', '$Reajuste', '$Fonte', '$Grupo', '$ObjetoAtividade',
      '$Acao', '$SubAcao', '$FichaFinanceira', '$MacroTema', '$GrauPriorizacao'
    )");

    if ($result) {
      echo "<p style='color: green;'>Contrato cadastrado com sucesso!</p>";
    } else {
      echo "<p style='color: red;'>Erro ao cadastrar: " . mysqli_error($conexao) . "</p>";
    }
  }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="formulario.css">

  <title>Formulario POA 2025</title>
</head>

<body>
  <form class="formulario" action="formulario.php" method="POST">
    <h1>Formulário POA 2025</h1>
    <hr>
    <br>
    <div class="linha">
      <div class="campo-pequeno">
        <label class="label">Tema de Custo</label>
        <select name="tema_custo" class="campo">
            <option>Selecione...</option>
            <option>01 - Apoio Administrativo - Estagiários</option>
            <option>02 - Combustível/Manutenção de Veículos</option>
            <option>03 - Demandas Judiciais</option>
            <option>04 - Diárias Civil</option>
            <option>05 - Limpeza e Conservação</option>
            <option>06 - Locação de Veículos</option>
            <option>07 - Manutenção Predial</option>
            <option>08 - Material de Expediente/Copa/Limpeza/Gráfico</option>
            <option>09 - Motoristas</option>
            <option>10 - Salário de Apenados</option>
            <option>11 - Rede Digital Corporativa do Estado</option>
            <option>12 - Serviços de Portaria</option>
            <option>13 - Serviços de Informática</option>
            <option>14 - Suprimento Individual</option>
            <option>15 - Vigilância Ostensiva</option>
            <option>16 - Auxílio Moradia</option>
            <option>17 - Cota Global</option>
            <option>18 - Passagens Aéreas</option>
            <option>19 - Energia Elétrica</option>
            <option>20 - Água e Esgoto</option>
            <option>21 - Outros</option>
            <option>22 - Folha de Pessoal</option>
            <option>23 - FGTS</option>
            <option>24 - INSS</option>
            <option>25 - Ressarcimento Pessoal à Disposição</option>
            <option>26 - Obras</option>
            <option>27 - Gerenciamento de Obras</option>
            <option>28 - Projetos de Obras</option>
            <option>29 - Regularização Fundiária</option>
            <option>30 - Ouvidoria</option>
        </select>
      </div>

        <div class="campo-pequeno">
        <label class="label">Setor Responsavel</label>
        <select name="setor_responsavel" class="campo">
            <option>Selecione...</option>
            <option>DAF (GAD)</option>
            <option>DOB</option>
            <option>DOE</option>
            <option>SPO</option>
            <option>DP (PESSOAL)</option>
            <option>DPH</option>
            <option>SAJ</option>
        </select>
      </div>

      <div class="campo-pequeno">
      <label class="label">Gestor Responsavel</label>
      <input type="text" name="gestor_responsavel" placeholder="Digite o nome do Gestor" class="campo">
      </div>
    </div>
    
    <div class="linha">
      <div class="campo-pequeno">
        <label class="label">Status</label>
        <select name="status_contrato" class="campo">
            <option>Selecione...</option>
            <option>Continuidade</option>
            <option>Novo</option>
        </select>
      </div>

      <div class="campo-pequeno">
        <label class="label">Nº do Contrato</label>
        <input type="text" name="numero_contrato" placeholder="Digite o número do contrato" class="campo">
      </div>
    
      <div class="campo-pequeno">
        <label class="label">Nome do Credor</label>
        <input type="text" name="nome_credor" placeholder="Digite o nome do credor" class="campo">
      </div>
    
      <div class="campo-pequeno">
        <label class="label">Vigência</label>
        <input type="text" name="vigencia" placeholder="Digite a vigência do contrato" class="campo">
      </div>
    </div>

    <div class="linha">
      <div class="campo-pequeno">
        <label class="label">DEA</label>
        <select name="dea" id="" class="campo">
            <option>Selecione...</option>
            <option>Sim</option>
            <option>Não</option>
        </select>
      </div>

      <div class="campo-pequeno">
        <label class="label">Reajuste</label>
        <select name="reajuste" id="" class="campo">
            <option>Selecione...</option>
            <option>Sim</option>
            <option>Não</option>
        </select>
      </div>

      <div class="campo-pequeno">
        <label class="label">Fonte</label>
        <select name="fonte" id="" class="campo">
            <option>Selecione...</option>
            <option>0500 - (Tesouro do Estado)</option>
            <option>0700 - (Repasse de Convênio)</option>
            <option>0754 - (Operação de Crédito)</option>
        </select>
      </div>

      <div class="campo-pequeno">
        <label class="label">Grupo</label>
        <select name="grupo" id="" class="campo">
            <option>Selecione...</option>
            <option>3 - Despesa Corrente</option>
            <option>4 - Investimentos</option>
        </select>
      </div>
    </div>

    <div class="linha-atividade">
        <div class="coluna-textarea">
          <label class="label">Objeto / Atividade</label>
          <textarea id="" name="objeto_atividade" placeholder="Digite o objeto ou atividade"></textarea>
        </div>
      
        <div class="coluna-campos">

          <div class="campo-pequeno">
            <label class="label">Ação</label>
            <select id="acao" name="acao">
                <option>Selecione...</option>
                <option>2904 - Formulação e Promoção Da Política de Regularização Fundiária</option>
                <option>2928 - Conservação do Patrimônio Público na Companhia Estadual de Habilitação e Obras - CEHAB</option>
                <option>2998 - Encargos Gerais da Companhia Estadual de Habilitação e Obras - CEHAB</option>
                <option>3902 - Fomento e Apoio ao Conselho Estadual de Habilitação de Interesse Social - CEHIS</option>
                <option>3927 - Manutenção da Ouvidoria da Companhia Estadual de Habilitação e Obras - CEHAB</option>
                <option>4058 - Ampliação da Oferta e Requalificação de Habitação de Interesse Social</option>
                <option>4300 - Execução de Obras de Infraestrutura e de Urbanização</option>
                <option>4301 - Pesquisa e Assessoria Técnica para Habitação de Interesse Social</option>
                <option>4354 - Gestão das Atividades da Companhia Estadual de Habitação e Obras - CEHAB</option>
                <option>4587 - Contribuições Patronais da CEHAB</option>
                <option>4613 - Encargos com o PIS e o COFINS da Companhia Estadual de Habitação e Obras - CHEAB</option>
              </select>
          </div>
      
          <div class="campo-pequeno">
            <label class="label">Sub-Ação</label>
            <select id="dea" name="sub_acao">
              <option>Selecione...</option>
              <option>0000 - OUTRAS MEDIDAS</option>
              <option>0050 - Programa Minha Casa (Operações Coletivas, CAIC, FNHIS e PSH) - Conclusão de moradias</option>
              <option>0865 - Operacionalização do Programa Minha Casa Minha Vida</option>
              <option>1163 - Acompanhamento do cadastro de famílias beneficiadas pelo auxílio moradia</option>
              <option>1399 - Execução de obras de infraestrutura e construção de unidades habitacionais na comunidade de Escorregou Tá Dentro (Afogados - Recife)</option>
              <option>1400 - Execução de obras de infraestrutura e construção de unidades habitacionais na comunidade de Mulheres de Tejucupapo (Iputinga - Recife)</option>
              <option>2067 - Obras e Projetos da Vila Claudete</option>
              <option>2217 - Execução das obras de implantação de adutora de recalque do Loteamento Santa Clara - Barreiros/PE</option>
              <option>2409 - Entrada Garantida - Programa Morar Bem</option>
              <option>2787 - Contribuições Patronais da CEHAB ao FUNAFIN</option>
              <option>2790 - Manutenção da Tecnologia de Informação e Comunidade da CEHAB</option>
              <option>2791 - Fornecimento de vale transporte para servidores da CEHAB</option>
              <option>2792 - Fornecimento de vale alimentação para servidores da CEHAB</option>
              <option>2793 - Regularização Fundiária e Oferta de Lotes Urbanos com Interesse Social</option>
              <option>2794 - Auxílio Moradia - CEHAB</option>
              <option>2885 - Reforma no Lar - PROGRAMA MORAR BEM PE</option>
              <option>3242 - Execução das obras de pavimentação, drenagem e sinalização da estrada Lygia Gomes da Silva - Ouro Preto</option>
              <option>3225 - Obras não incidentes - FAR e FDS</option>
              <option>3352 - Programa Morar Bem - Construção de Unidades Habitacionais</option>
              <option>A386 - Execução das obras de infraestrutura e construção de unidades habitacionais na Bacia do Fragoso II</option>
              <option>A389 - Execução das obras de infraestrutura e construção de unidades habitacionais no Canal do Jordão</option>
              <option>A401 - Execução das obras de infraestrutura e construção de unidades habitacionais em Azeitona (UE11) e Peixinhos (UE12)</option>
              <option>B156 - Construção da Via Metropolitana Norte (Fragoso - viaduto da PE-15/revestimento do canal/viário até Janga)</option>
              <option>B661 - Despesas com taxa de água e esgoto da CEHAB</option>
              <option>B662 - Despesas com combustível da CEHAB</option>
              <option>B664 - Despesas com locação de veículos da CEHAB</option>
              <option>B665 - Prestação de serviços de limpeza e conservação da CEHAB</option>
              <option>B666 - Despesas com locação de veículos da CEHAB</option>
              <option>B667 - Pestação de serviços de motorista na CEHAB</option>
              <option>B668 - Despesas com publicações oficiais da CEHAB em diário oficial</option>
              <option>B669 - Pagamento de apenados em processo de ressocialização na CEHAB</option>
              <option>B970 - Prestação de serviços de segurança pessoal e patrimonial na CEHAB</option>
            </select>
          </div>
        </div>
      </div>

  <br>

  <div class="linha">
    <div class="campo-pequeno">
      <label class="label">Ficha Financeira</label>
        <select name="ficha_financeira" class="campo">
        <option>Selecione...</option>
        <option>G3 - Água e Esgoto</option>
        <option>G3 - Apoio Administrativo - Estagiários</option>
        <option>G3 - Auxílio Funeral</option>
        <option>G3 - Auxílio Moradia</option>
        <option>G3 - Auxílio Moradia - Operação Prontidão</option>
        <option>G3 - Combustível/Manutenção Veículos</option>
        <option>G3 - Cota Global</option>
        <option>G3 - Demandas Judiciais</option>
        <option>G4 - Devolução - Recursos do Concedente</option>
        <option>G3 - Diárias Civil</option>
        <option>G3 - Energia Elétrica</option>
        <option>G1 - FGTS</option>
        <option>G3 - Fornecimento de Passagens</option>
        <option>G1 - INSS</option>
        <option>G3 - Limpeza e Conservação</option>
        <option>G3 - Locomoção de Veículos</option>
        <option>G3 - Manutenção Predial</option>
        <option>G3 - Material de Expediente/Copa/Limpeza/Gráfico</option>
        <option>G3 - Motoristas</option>
        <option>G4 - Obra</option>
        <option>G4 - Operação de Crédito</option>
        <option>G4 - Outros</option>
        <option>G3 - Outros</option>
        <option>G1 - Pessoal e Encargos Sociais</option>
        <option>G3 - Publicações Oficiais</option>
        <option>G4 - Recursos do Concedente</option>
        <option>G3 - Rede Digital Corporativa do Estado</option>
        <option>G1 - Ressarcimento Pessoal à Disposição</option>
        <option>G3 - Salário de Apenados</option>
        <option>G3 - Serviços de Informática</option>
        <option>G3 - Serviços de Portaria</option>
        <option>G3 - Suprimento Individual</option>
        <option>G3 - Vigilância Ostensiva</option>
        <option>G4 - Supervisão de Obras</option>
    </select>
    </div>

    <div class="campo-pequeno">
      <label class="label">Macro Tema</label>
    <select name="macro_tema" class="campo">
        <option>Selecione...</option>
        <option>SUPORTE A GESTÃO</option>
        <option>MÃO DE OBRA TERCEIRIZADA</option>
        <option>OUTROS</option>
        <option>AUXÍLIO</option>
        <option>FROTA</option>
        <option>CONVÊNIO</option>
        <option>PESSOAL E ENCARGOS SOCIAIS</option>
        <option>OBRAS</option>
        <option>OPERAÇÕES DE CRÉDITO</option>
    </select>
    </div>

    <div class="campo-pequeno">
      <label class="label">Grau de Priorização</label>
      <select name="grau_priorizacao" class="campo">
        <option>Selecione...</option>
        <option>Grau Alto</option>
        <option>Grau Médio/Alto</option>
        <option>Grau Médio</option>
        <option>Grau Médio/Baixo</option>
        <option>Grau Baixo</option>
    </select>
    </div>
  </div>

    <button type="submit" name="submit" id="submit" class="btn btn-create-account">Fazer Contrato</button>
    <p class="texto-login">Cancelar</p>

  </form>

</body>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const temaCusto = document.querySelector('select[name="tema_custo"]');
    const fonte = document.querySelector('select[name="fonte"]');
    const grupo = document.querySelector('select[name="grupo"]');
    const acao = document.querySelector('select[name="acao"]');
    const subAcao = document.querySelector('select[name="sub_acao"]');
    const fichaFinanceira = document.querySelector('select[name="ficha_financeira"]');

    temaCusto.addEventListener('change', function () {
      if (this.value === "Selecione...") {
        fonte.value = "Selecione...";
        grupo.value = "Selecione...";
        acao.value = "Selecione...";
        subAcao.value = "Selecione...";
        fichaFinanceira.value = "Selecione...";
      }
      
      if (this.value === "29 - Regularização Fundiária") {
        fonte.value = "0500 - (Tesouro do Estado)";
        grupo.value = "3 - Despesa Corrente";
        acao.value = "2904 - Formulação e Promoção Da Política de Regularização Fundiária";
        subAcao.value = "0000 - OUTRAS MEDIDAS";
        fichaFinanceira.value = "G3 - Outros";
      }

      if (this.value === "05 - Limpeza e Conservação") {
        
      }

      if (this.value === "21 - Outros") {
        
      }

      if (this.value === "30 - Ouvidoria") {
        
      }

      if (this.value === "31 - FINHIS") {
        
      }

      if (this.value === "32 - Minha Casa Minha Vida") {
        
      }

      if (this.value === "26 - Obras") {
        
      }

      if (this.value === "27 - Gerenciamento") {
        
      }


    });
  });
</script>

</html>
