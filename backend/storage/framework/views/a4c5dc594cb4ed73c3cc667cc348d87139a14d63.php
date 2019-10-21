<?php $__env->startSection('content'); ?>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><?php echo e(__('Cadastro')); ?></div>

                <div class="card-body">
                    <form method="POST" action="<?php echo e(route('register')); ?>">
                        <?php echo csrf_field(); ?>

                        <div class="form-group row">
                            <label for="username_git" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Username do GitHub')); ?></label>

                            <div class="col-md-4">
                                <input id="username_git" type="text" class="form-control" name="username_git">
                            </div>

                            <div class="col-md-2">
                                <input type="button" id="pesqgit" value="<?php echo e(__('Buscar')); ?>" class="btn btn-dark float-right" onclick="pesquisaGit();">
                            </div>
                            <div class="col-md-2">
                                <input type="button" id="limpgit" value="<?php echo e(__('Limpar')); ?>" class="btn btn-secondary float-right" disabled onclick="limpa_formulário_git();">
                            </div>

                            <?php if ($errors->has('username_git')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('username_git'); ?>
                                <span class="invalid-feedback" role="alert">
                                    <strong><?php echo e($message); ?></strong>
                                </span>
                            <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>

                        </div>

                        <div class="form-group row">
                            <label for="nome" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Nome')); ?></label>

                            <div class="col-md-8">
                                <input id="nome" type="text" class="form-control <?php if ($errors->has('nome')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nome'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="nome" value="<?php echo e(old('nome')); ?>" required autocomplete="name" autofocus>

                                <?php if ($errors->has('nome')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('nome'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-3 col-form-label text-md-right"><?php echo e(__('E-Mail')); ?></label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="email" value="<?php echo e(old('email')); ?>" required autocomplete="email">

                                <?php if ($errors->has('email')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('email'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Senha')); ?></label>

                            <div class="col-md-8">
                                <input id="password" type="password" class="form-control <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="password" required autocomplete="new-password">

                                <?php if ($errors->has('password')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('password'); ?>
                                    <span class="invalid-feedback" role="alert">
                                        <strong><?php echo e($message); ?></strong>
                                    </span>
                                <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Confirme a Senha')); ?></label>

                            <div class="col-md-8">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-header mb-2">Endereço</h5>

                                <div class="form-group row">
                                    <label for="cep" class="col-md-2 col-form-label text-md-right"><?php echo e(__('CEP')); ?></label>

                                    <div class="col-md-6">
                                        <input id="cep" type="text" class="form-control" name="cep" size="10" maxlength="9" required>
                                    </div>

                                    <div class="col-md-2">
                                        <input type="button" id="pesqcep" value="<?php echo e(__('Buscar')); ?>" class="btn btn-dark float-right" onclick="pesquisaCEP();">
                                    </div>
                                    <div class="col-md-2">
                                        <input type="button" id="limpcep" value="<?php echo e(__('Limpar')); ?>" class="btn btn-secondary float-right" disabled onclick="limpa_formulário_cep();">
                                    </div>

                                    <?php if ($errors->has('cep')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cep'); ?>
                                        <span class="invalid-feedback" role="alert">
                                            <strong><?php echo e($message); ?></strong>
                                        </span>
                                    <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                </div>

                                <div class="form-group row">
                                    <label for="logradouro" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Logradouro')); ?></label>

                                    <div class="col-md-5">
                                        <input id="logradouro" type="text" class="form-control <?php if ($errors->has('logradouro')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logradouro'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="logradouro" required autofocus>

                                        <?php if ($errors->has('logradouro')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('logradouro'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>


                                    <label for="logradouro" class="col-md-3 col-form-label text-md-right"><?php echo e(__('Complemento')); ?></label>
                                    <div class="col-md-2">
                                        <input id="complemento" type="text" class="form-control <?php if ($errors->has('complemento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('complemento'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="complemento" required autofocus>

                                        <?php if ($errors->has('complemento')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('complemento'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <label for="bairro" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Bairro')); ?></label>

                                    <div class="col-md-10">
                                        <input id="bairro" type="text" class="form-control <?php if ($errors->has('bairro')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bairro'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="bairro" required autofocus>

                                        <?php if ($errors->has('bairro')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('bairro'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="cidade" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Cidade')); ?></label>

                                    <div class="col-md-5">
                                        <input id="cidade" type="text" class="form-control <?php if ($errors->has('cidade')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cidade'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="cidade" autofocus readonly>

                                        <?php if ($errors->has('cidade')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('cidade'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>


                                    <label for="estado" class="col-md-2 col-form-label text-md-right"><?php echo e(__('Estado')); ?></label>
                                    <div class="col-md-3">
                                        <input id="estado" type="text" class="form-control <?php if ($errors->has('estado')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('estado'); ?> is-invalid <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>" name="estado" autofocus readonly>

                                        <?php if ($errors->has('estado')) :
if (isset($message)) { $messageCache = $message; }
$message = $errors->first('estado'); ?>
                                            <span class="invalid-feedback" role="alert">
                                                <strong><?php echo e($message); ?></strong>
                                            </span>
                                        <?php unset($message);
if (isset($messageCache)) { $message = $messageCache; }
endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row mb-0 mt-2">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary float-right">
                                    <?php echo e(__('Registrar')); ?>

                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('scripts'); ?>
<script type="text/javascript">
    function limpa_formulário_git() {
            //Limpa valores do formulário de git.
            document.getElementById('nome').value=("");

            document.getElementById('username_git').setAttribute('readonly',false);
            document.getElementById('pesqgit').disabled=false;
            document.getElementById('limpgit').disabled=true;
    }
    function meu_callback_git(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('nome').value=(conteudo.data.name);

            document.getElementById('username_git').setAttribute('readonly',true);
            document.getElementById('pesqgit').disabled=true;
            document.getElementById('limpgit').disabled=false;
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_git();
            alert("Username do GitHub não encontrado.");
        }
    }
    function pesquisaGit() {

        var login = document.getElementById('username_git').value;

        //Nova variável "cep" somente com dígitos.
        //  var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (login != "") {

            //Preenche os campos com "..." enquanto consulta webservice.
            document.getElementById('nome').value="...";

            //Cria um elemento javascript.
            var script = document.createElement('script');

            //Sincroniza com o callback.
            script.src = 'https://api.github.com/users/'+ login + '?callback=meu_callback_git';

            console.log(script.src);

            //Insere script no documento e carrega o conteúdo.
            document.body.appendChild(script);
        } //end if.
        else {
            alert("Campo Username GitHub vazio.");
        }
    };



	function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('cep').value=("");
            document.getElementById('logradouro').value=("");
            document.getElementById('complemento').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('estado').value=("");

            document.getElementById('pesqcep').disabled=false;
            document.getElementById('limpcep').disabled=true;
            document.getElementById('cep').disabled=false;
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('logradouro').value=(conteudo.logradouro);
            document.getElementById('complemento').value=(conteudo.complemento);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('estado').value=(conteudo.uf);

            document.getElementById('cep').disabled=true;
            document.getElementById('pesqcep').disabled=true;
            document.getElementById('limpcep').disabled=false;
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisaCEP() {

        var valor = document.getElementById('cep').value;

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('logradouro').value="...";
                document.getElementById('complemento').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('estado').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            alert("Campo CEP vazio.");
        }
    };
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH /var/www/resources/views/auth/register.blade.php ENDPATH**/ ?>