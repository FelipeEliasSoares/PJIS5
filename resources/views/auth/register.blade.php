<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

<div class="container-fluid vh-100">
    <div class="row h-100">
        <!-- Lado esquerdo - Formulários de registro -->
        <div class="col-md-6 d-flex align-items-center justify-content-center">
            <div class="w-75">
                <!-- Tela de escolha -->
                <div id="choiceScreen">
                    <h1 class="mb-2 fw-bold">Crie sua conta</h1>
                    <p class="mb-4 text-muted">Escolha o tipo de conta para continuar.</p>

                    <div class="d-grid gap-3">
                        <button onclick="showForm('companyForm')" class="btn btn-primary py-2">Registrar como Empresa</button>
                        <button onclick="showForm('memberForm')" class="btn btn-primary py-2">Registrar como Membro</button>
                    </div>
                </div>

                <!-- Formulário de registro da empresa -->
                <div id="companyForm" style="display: none;">
                    <h1 class="mb-2 fw-bold">Registro da Empresa</h1>
                    <p class="mb-4 text-muted">Digite os detalhes da sua empresa abaixo.</p>

                    <form method="POST" action="{{ route('register.company') }}">
                        @csrf
                        <!-- Campos do formulário de empresa -->
                        <div class="progress mb-3">
                            <div id="companyProgress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>

                        <x-label for="company_nome" value="{{ __('Nome da Empresa') }}" />
                        <x-input id="company_nome" class="form-control mb-3" type="text" name="nome" :value="old('nome')" required />

                        <x-label for="company_email" value="{{ __('E-mail') }}" />
                        <x-input id="company_email" class="form-control mb-3" type="email" name="email" :value="old('email')" required />

                        <x-label for="company_cnpj" value="{{ __('CNPJ') }}" />
                        <x-input id="company_cnpj" class="form-control mb-3" type="text" name="cnpj" :value="old('cnpj')" required />

                        <x-label for="company_rua" value="{{ __('Rua') }}" />
                        <x-input id="company_rua" class="form-control mb-3" type="text" name="rua" :value="old('rua')" required />

                        <x-label for="company_numero" value="{{ __('Número') }}" />
                        <x-input id="company_numero" class="form-control mb-3" type="text" name="numero" :value="old('numero')" required />

                        <x-label for="company_complemento" value="{{ __('Complemento') }}" />
                        <x-input id="company_complemento" class="form-control mb-3" type="text" name="complemento" :value="old('complemento')" />

                        <x-label for="company_cidade" value="{{ __('Cidade') }}" />
                        <x-input id="company_cidade" class="form-control mb-3" type="text" name="cidade" :value="old('cidade')" required />

                        <x-label for="company_estado" value="{{ __('Estado') }}" />
                        <x-input id="company_estado" class="form-control mb-3" type="text" name="estado" :value="old('estado')" required />

                        <x-label for="company_cep" value="{{ __('CEP') }}" />
                        <x-input id="company_cep" class="form-control mb-3" type="text" name="cep" :value="old('cep')" required />

                        <x-label for="company_password" value="{{ __('Senha') }}" />
                        <x-input id="company_password" class="form-control mb-3" type="password" name="password" required />

                        <x-label for="company_password_confirmation" value="{{ __('Confirmar Senha') }}" />
                        <x-input id="company_password_confirmation" class="form-control mb-3" type="password" name="password_confirmation" required />

                        <x-button class="btn btn-primary w-100 py-2">
                            {{ __('Registrar') }}
                        </x-button>
                    </form>
                </div>

                <!-- Formulário de registro do membro -->
                <div id="memberForm" style="display: none;">
                    <h1 class="mb-2 fw-bold">Registro de Membro</h1>
                    <p class="mb-4 text-muted">Digite os detalhes do membro abaixo.</p>

                    <form method="POST" action="{{ route('register.member') }}">
                        @csrf

                        <div class="progress mb-3">
                            <div id="memberProgress" class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                        <!-- Campos do formulário de membro -->

                        <x-label for="member_cargo" value="{{ __('Cargo') }}" />
                        <x-input id="member_cargo" class="form-control mb-3" type="text" name="cargo" :value="old('cargo')" required />

                        <x-label for="member_nome" value="{{ __('Nome') }}" />
                        <x-input id="member_nome" class="form-control mb-3" type="text" name="nome" :value="old('nome')" required />

                        <x-label for="member_idade" value="{{ __('Idade') }}" />
                        <x-input id="member_idade" class="form-control mb-3" type="number" name="idade" :value="old('idade')" required />

                        <x-label for="member_email" value="{{ __('E-mail') }}" />
                        <x-input id="member_email" class="form-control mb-3" type="email" name="email" :value="old('email')" required />

                        <x-label for="member_telefone" value="{{ __('Telefone') }}" />
                        <x-input id="member_telefone" class="form-control mb-3" type="text" name="telefone" :value="old('telefone')" required />

                        <x-label for="member_cpf" value="{{ __('CPF') }}" />
                        <x-input id="member_cpf" class="form-control mb-3" type="text" name="cpf" :value="old('cpf')" required />

                        <x-label for="member_rua" value="{{ __('Rua') }}" />
                        <x-input id="member_rua" class="form-control mb-3" type="text" name="rua" :value="old('rua')" required />

                        <x-label for="member_numero" value="{{ __('Número') }}" />
                        <x-input id="member_numero" class="form-control mb-3" type="text" name="numero" :value="old('numero')" required />

                        <x-label for="member_complemento" value="{{ __('Complemento') }}" />
                        <x-input id="member_complemento" class="form-control mb-3" type="text" name="complemento" :value="old('complemento')" />

                        <x-label for="member_cidade" value="{{ __('Cidade') }}" />
                        <x-input id="member_cidade" class="form-control mb-3" type="text" name="cidade" :value="old('cidade')" required />

                        <x-label for="member_estado" value="{{ __('Estado') }}" />
                        <x-input id="member_estado" class="form-control mb-3" type="text" name="estado" :value="old('estado')" required />

                        <x-label for="member_cep" value="{{ __('CEP') }}" />
                        <x-input id="member_cep" class="form-control mb-3" type="text" name="cep" :value="old('cep')" required />

                        <x-label for="member_password" value="{{ __('Senha') }}" />
                        <x-input id="member_password" class="form-control mb-3" type="password" name="password" required />

                        <x-label for="member_password_confirmation" value="{{ __('Confirmar Senha') }}" />
                        <x-input id="member_password_confirmation" class="form-control mb-3" type="password" name="password_confirmation" required />

                        <x-button class="btn btn-primary w-100 py-2">
                            {{ __('Registrar') }}
                        </x-button>
                    </form>
                </div>

                <p class="text-center mt-4 small text-muted">
                    <a href="#" onclick="showChoiceScreen()" class="text-decoration-none">Voltar para escolha</a> |
                    Já tem uma conta? <a href="{{ route('login') }}" class="text-decoration-none">Faça login</a>
                </p>
            </div>
        </div>

        <!-- Lado direito - Imagem -->
        <div class="col-md-6 d-none d-md-block" style="background: url('{{ asset('img/images.jpeg') }}') center/cover no-repeat;">
        </div>
    </div>
</div>

<script>
    // Função para exibir o formulário apropriado com base na escolha do usuário
    function showForm(formId) {
        document.getElementById('choiceScreen').style.display = 'none';
        document.getElementById('companyForm').style.display = formId === 'companyForm' ? 'block' : 'none';
        document.getElementById('memberForm').style.display = formId === 'memberForm' ? 'block' : 'none';
    }

    // Função para mostrar a tela inicial de escolha
    function showChoiceScreen() {
        document.getElementById('choiceScreen').style.display = 'block';
        document.getElementById('companyForm').style.display = 'none';
        document.getElementById('memberForm').style.display = 'none';
    }

    // Função para atualizar a barra de progresso com base nos campos preenchidos no formulário
    function updateProgress(formId, progressBarId) {
        const form = document.getElementById(formId);
        const progressBar = document.getElementById(progressBarId);
        const inputs = form.querySelectorAll('input[required]');
        let filled = 0;
        inputs.forEach(input => {
            if (input.value.trim() !== '') {
                filled++;
            }
        });
        const progress = Math.round((filled / inputs.length) * 100);
        progressBar.style.width = progress + '%';
        progressBar.setAttribute('aria-valuenow', progress);
    }

    // Adicionar event listeners para atualizar a barra de progresso quando os campos de entrada mudarem
    document.querySelectorAll('#companyForm input[required]').forEach(input => {
        input.addEventListener('input', () => updateProgress('companyForm', 'companyProgress'));
    });

    document.querySelectorAll('#memberForm input[required]').forEach(input => {
        input.addEventListener('input', () => updateProgress('memberForm', 'memberProgress'));
    });
</script>

<link href="/resources/css/register.css" rel="stylesheet">
