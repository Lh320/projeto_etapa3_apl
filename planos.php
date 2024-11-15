<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Escolha seu Plano de Internet</title>
  <link rel="stylesheet" href="css/styles.css">
  <script src="js/script.js"></script>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
      background-color: #f4f4f4;
    }
    main {
      max-width: 500px;
      margin: 0 auto;
      padding: 20px;
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    h1 {
      text-align: center;
      margin-bottom: 20px;
    }
    .user-info {
      margin-bottom: 15px;
    }
    label {
      display: block;
      margin-bottom: 5px;
    }
    input, select {
      width: 100%;
      padding: 10px;
      border: 1px solid #ccc;
      border-radius: 4px;
    }
    button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      font-size: 16px;
    }
    button:hover {
      background-color: #0056b3;
    }
    #cpf, #cnpj {
      display: none;
    }
  </style>
</head>
<body>

  <main>
    <h1>Plano Ideal</h1>
    
    <form id="formulario" name="orcamento">
      <div class="user-info">
        <label for="nome">Nome:</label>
        <input type="text" id="nome" name="nome" onblur="calculos(this.form)" required>
      </div>
      
      <div class="user-info">
        <label for="data">Data de Aniversário:</label>
        <input type="date" id="data" name="data" required>
      </div>
      
      <div class="user-info">
        <label for="email">E-mail:</label>
        <input type="email" id="email" name="email" required>
      </div>

      <div class="user-info">
        <label for="pessoa">Tipo de Pessoa:</label>
        <select id="pessoa" name="pessoa" onchange="pessoa(this.value)">
          <option value="">Selecione</option>
          <option value="pf">Pessoa Física</option>
          <option value="pj">Pessoa Jurídica</option>
        </select>
      </div>

      <div class="user-info" id="cpf">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" onkeypress="return somente_numero(event)" oninput="mascara_cpf(this)" maxlength="14" required>
      </div>

      <div class="user-info" id="cnpj">
        <label for="cnpj">CNPJ:</label>
        <input type="text" name="cnpj" onkeypress="return somente_numero(event)" oninput="mascara_cnpj(this)" maxlength="18" required>
      </div>

      <div class="user-info">
        <label for="telefone">Telefone:</label>
        <input type="text" id="telefone" name="telefone" onkeypress="return somente_numero(event)" oninput="mascara_tel(this)" maxlength="14" required>
      </div>

      <div class="user-info">
        <label for="plano">Plano:</label>
        <select id="plano" name="plano" required>
          <option value="">Selecione o Plano</option>
          <option value="Empresarial">Empresarial (200 Mbps | R$ 150/mês)</option>
          <option value="Premium">Premium (500 Mbps | R$ 300/mês)</option>
          <option value="Profissional">Profissional (1000 Mbps | R$ 500/mês)</option>
          <option value="Intermediário">Intermediário (100 Mbps | R$ 80/mês)</option>
          <option value="Simples">Simples (30 Mbps | R$ 50/mês)</option>
          <option value="Corporativo">Corporativo (1000 Mbps | R$ 800/mês)</option>
          <option value="Para ONGs">Para ONGs (200 Mbps | R$ 100/mês)</option>
          <option value="Para Escolas">Para Escolas (500 Mbps | R$ 200/mês)</option>
        </select>
      </div>

      <div class="user-info">
        <label for="forma-pagamento">Forma de Pagamento:</label>
        <select id="forma-pagamento" name="pagamento" onchange="abrir()" required>
          <option value="Cartão de Crédito">Cartão de Crédito</option>
          <option value="Boleto Bancário">Boleto Bancário</option>
          <option value="Transferência Bancária">Transferência Bancária</option>
        </select>
      </div>

      <div id="cartao" class="user-info">
        <label for="num">Número do Cartão:</label>
        <input type="text" id="num" name="num" onkeypress="return somente_numero(event)" maxlength="16">
      </div>

      <div class="user-info">
        <label for="salario">Salário:</label>
        <input type="number" id="salario" name="salario" min="0" step="0.01" required>
      </div>
      
      <button type="button" onclick="gerarCartao()">Gerar Cartão</button>
    </form>
  </main>

  <div id="cartao" class="cartao">
    <p id="resposta"></p>
  </div>

  <script>
    function pessoa(obj) {
        if (obj == "pf") {
            document.getElementById('cpf').style.display = "block";
            document.getElementById('cnpj').style.display = "none";
            document.orcamento.cpf.focus();
        } else {
            document.getElementById('cpf').style.display = "none";
            document.getElementById('cnpj').style.display = "block";
            document.orcamento.cnpj.focus();
        }
    }

    function mascara_cpf(obj) {
        if (obj.value.length == 3 || obj.value.length == 7) {
            obj.value += ".";
        } else if (obj.value.length == 11) {
            obj.value += "-";
        }
        salto(obj, 'cpf');
    }

    function mascara_cnpj(obj) {
        if (obj.value.length == 2 || obj.value.length == 6) {
            obj.value += ".";
        } else if (obj.value.length == 10) {
            obj.value += "/";
        } else if (obj.value.length == 15) {
            obj.value += "-";
        }
        salto(obj, 'cnpj');
    }

    function mascara_tel(obj) {
        if (obj.value.length == 0) {
            obj.value += "(";
        } else if (obj.value.length == 3) {
            obj.value += ")";
        } else if (obj.value.length == 9) {
            obj.value += "-";
        }
        salto(obj, 'telefone');
    }

    function salto(obj, campo) {
        if (campo === 'cpf' && obj.value.length === 14) {
            document.orcamento.telefone.focus();
        } else if (campo === 'cnpj' && obj.value.length === 18) {
            document.orcamento.telefone.focus();
        } else if (campo === 'telefone' && obj.value.length === 14) {
            document.orcamento.pagamento.focus();
        }
    }

    function abrir() {
        const pagamento = document.orcamento.pagamento.value;
        if (pagamento == "Cartão de Crédito") {
            document.getElementById('cartao').style.display = "block";
            document.orcamento.num.focus();
        } else {
            document.getElementById('cartao').style.display = "none";
        }
    }

    function somente_numero(e) {
        const tecla = (window.event) ? event.keyCode : e.which;
        if ((tecla >= 48 && tecla <= 57) || (tecla >= 96 && tecla <= 105) || tecla === 8 || tecla === 37 || tecla === 39 || tecla === 46) {
            return true;
        } else {
            return false;
        }
    }

    function gerarCartao() {
        if (validarFormulario()) {
            document.getElementById('resposta').textContent = 'Cartão gerado com sucesso!';
        }
    }

    function validarFormulario() {
        let isValid = true;

        const nome = document.getElementById('nome').value.trim();
        const email = document.getElementById('email').value.trim();
        const salario = document.getElementById('salario').value;

        if (nome === "") {
            isValid = false;
            alert('Por favor, insira seu nome.');
        }

        if (email === "") {
            isValid = false;
            alert('Por favor, insira seu e-mail.');
        }

        if (isNaN(salario) || salario <= 0) {
            isValid = false;
            alert('Por favor, insira um salário válido.');
        }

        return isValid;
    }
  </script>
</body>
</html>
