<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulário com Tema Personalizado</title>
  
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body.light-mode {
            background-color: #f8f9fa;
            color: #495057;
        }
        body.dark-mode {
            background-color: #343a40;
            color: #ffffff;
        }
        .form-container {
            max-width: 600px;
            margin: 50px auto;
            padding: 30px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }
        body.dark-mode .form-container {
            background-color: #495057;
            color: #ffffff;
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .btn-custom {
            position: fixed;
            top: 20px;
            left: 20px;
            z-index: 1000;
        }
    </style>
</head>
<body class="light-mode">

   
    <a href="planos.php" class="btn btn-secondary btn-custom" role="button">formulario primeira etapa</a>

<div class="container">
    <div class="form-container">
        
    <form id="meuFormulario" class="needs-validation" novalidate method="post" action="cadastrar.php">
   
   <div class="mb-3">
       <label for="nome" class="form-label">Nome</label>
       <input type="text" class="form-control" id="nome" name="nome" placeholder="Digite seu nome" required>
       <div class="invalid-feedback">Por favor, insira o nome.</div>
   </div>

   <div class="mb-3">
       <label for="telefone" class="form-label">Telefone</label>
       <input type="text" class="form-control" id="telefone" name="telefone" placeholder="(XX) XXXXX-XXXX" oninput="mascara_tel(this)" maxlength="14" required>
       <div class="invalid-feedback">Por favor, insira um número de telefone válido.</div>
   </div>

   <div class="mb-3">
       <label for="tipoDocumento" class="form-label">Tipo de Documento</label>
       <select class="form-select" id="tipoDocumento" name="tipoDocumento" onchange="pessoa(this.value)" required>
           <option value="" disabled selected>Escolha o tipo de documento</option>
           <option value="cpf">CPF</option>
           <option value="cnpj">CNPJ</option>
       </select>
       <div class="invalid-feedback">Por favor, escolha um tipo de documento.</div>
   </div>

   <div class="mb-3 d-none" id="campoCPF">
       <label for="cpf" class="form-label">CPF</label>
       <input type="text" class="form-control" id="cpf" name="cpf" placeholder="XXX.XXX.XXX-XX" oninput="mascara_cpf(this)" maxlength="14">
       <div class="invalid-feedback">Por favor, insira um CPF válido.</div>
   </div>

   <div class="mb-3 d-none" id="campoCNPJ">
       <label for="cnpj" class="form-label">CNPJ</label>
       <input type="text" class="form-control" id="cnpj" name="cnpj" placeholder="XX.XXX.XXX/XXXX-XX" oninput="mascara_cnpj(this)" maxlength="18">
       <div class="invalid-feedback">Por favor, insira um CNPJ válido.</div>
   </div>

   <div class="mb-3">
       <label for="rg" class="form-label">RG</label>
       <input type="text" class="form-control" id="rg" name="rg" placeholder="XX.XXX.XXX-X" oninput="mascara_rg(this)" maxlength="12" required>
       <div class="invalid-feedback">Por favor, insira um RG válido.</div>
   </div>

   <div class="mb-3">
   <label for="senha" class="form-label">Senha</label>
   <input type="password" class="form-control" id="senha" name="senha" placeholder="Digite sua senha" required>
   <div class="invalid-feedback">Por favor, insira uma senha.</div>
</div>


   <button class="btn btn-primary w-100" type="submit">Enviar</button>
</form>

    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

<script>
 
    function pessoa(tipo) {
        const cpfCampo = document.getElementById('campoCPF');
        const cnpjCampo = document.getElementById('campoCNPJ');
        
        if (tipo === "cpf") {
            cpfCampo.classList.remove('d-none');
            cnpjCampo.classList.add('d-none');
            document.getElementById('cpf').setAttribute('required', 'required');
            document.getElementById('cnpj').removeAttribute('required');
            document.getElementById('cpf').focus();
        } else if (tipo === "cnpj") {
            cnpjCampo.classList.remove('d-none');
            cpfCampo.classList.add('d-none');
            document.getElementById('cnpj').setAttribute('required', 'required');
            document.getElementById('cpf').removeAttribute('required');
            document.getElementById('cnpj').focus();
        }
    }


    function mascara_cpf(obj) {
        let value = obj.value.replace(/\D/g, '');
        if (value.length <= 11) {
            obj.value = value.replace(/(\d{3})(\d)/, '$1.$2')
                             .replace(/(\d{3})(\d)/, '$1.$2')
                             .replace(/(\d{3})(\d)/, '$1-$2');
        }
        pularCampo(obj, 14, 'rg');
    }

    function mascara_cnpj(obj) {
        let value = obj.value.replace(/\D/g, '');
        if (value.length <= 14) {
            obj.value = value.replace(/(\d{2})(\d)/, '$1.$2')
                             .replace(/(\d{3})(\d)/, '$1.$2')
                             .replace(/(\d{3})(\d)/, '$1/$2')
                             .replace(/(\d{4})(\d)/, '$1-$2');
        }
        pularCampo(obj, 18, 'rg');
    }

    function mascara_tel(obj) {
        let value = obj.value.replace(/\D/g, '');
        if (value.length <= 11) {
            obj.value = value.replace(/(\d{2})(\d)/, '($1) $2')
                             .replace(/(\d{5})(\d)/, '$1-$2');
        }
        pularCampo(obj, 14, 'tipoDocumento');
    }

    function mascara_rg(obj) {
        let value = obj.value.replace(/\D/g, '');
        if (value.length <= 9) {
            obj.value = value.replace(/(\d{2})(\d)/, '$1.$2')
                             .replace(/(\d{3})(\d)/, '$1.$2')
                             .replace(/(\d{3})(\d)/, '$1-$2');
        }
    }

    function pularCampo(obj, maxLength, proximoCampoId) {
        if (obj.value.length >= maxLength) {
            document.getElementById(proximoCampoId).focus();
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

    
    

    
    (() => {
        'use strict';
        const forms = document.querySelectorAll('.needs-validation');
        Array.prototype.slice.call(forms).forEach((form) => {
            form.addEventListener('submit', (event) => {
                if (!form.checkValidity()) {
                    event.preventDefault();
                    event.stopPropagation();
                } else {
                    event.preventDefault();
                    if (confirm("Deseja realmente enviar o formulário?")) {
                        form.submit();
                    }
                }
                form.classList.add('was-validated');
            }, false);
        });
    })();
</script>

</body>
</html>
