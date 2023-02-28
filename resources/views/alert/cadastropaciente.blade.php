<style>
    .containerAlert{
        text-align: center;
        margin-left: 2%;
        margin-right: 2%;
    }
</style>
<script type="text/javascript">
    $(document).ready(function () { 
        var $seuCampoCpf = $("#cpf");
        $seuCampoCpf.mask('000.000.000-00', {reverse: true});

        var $seuCampoCep = $("#cep");
        $seuCampoCep.mask('00000-000', {reverse: true});

    });
</script>

<div class="containerAlert">

    <?php 
        // Campos do formulário de cadastro de pacientes
    ?>

    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if(Session::has('cadastropaciente-success'))
        <div class="alert alert-success" role="alert">
            {{ Session::pull('cadastropaciente-success', 'default') }}
        </div>
    @endif

    @if(Session::has('cadastropaciente-error'))
        <div class="alert alert-danger" role="alert">
            {{ Session::pull('cadastropaciente-error', 'default') }}
        </div>
    @endif

    

</div>