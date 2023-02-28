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

    

</div>