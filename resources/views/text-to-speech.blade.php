<link rel="stylesheet" href="{{ asset('css/styles.css') }}">

<h1>Seja Bem-Vindo José Maria</h1>

<div class= "container-form">
<h2>Conversor de texto para voz</h2>

<form method="POST" action="{{ route('text-to-speech.generate') }}" style="margin-bottom: 30px;">
    @csrf
    <input type="text" name="texto" id="text-input" placeholder="Digite seu texto aqui" required>
    <button type="submit">Gerar Áudio</button>
</form>

<div id="loading" style="visibility: hidden; margin-top: 20px;">
    <div class="spinner"></div>
    <p>Gerando áudio...</p>
</div>

<audio id="audio-player"></audio>

<script>    
document.querySelector('form').addEventListener('submit', function(e) {
    e.preventDefault(); 
    
    document.getElementById('loading').style.visibility = 'visible';
    
    let texto = document.getElementById('text-input').value;
    let formData = new FormData();
    formData.append('texto', texto);
    formData.append('_token', '{{ csrf_token() }}');
    
    fetch('{{ route("text-to-speech.generate") }}', {
        method: 'POST',
        body: formData
    })
    .then(response => response.blob())
    .then(blob => {
        document.getElementById('loading').style.visibility = 'hidden';
        
        let audioUrl = URL.createObjectURL(blob);
        let audio = document.getElementById('audio-player');
        audio.src = audioUrl;
        audio.play();
    });
});
</script>

<!-- <script src="https://code.responsivevoice.org/responsivevoice.js?key=UVmgAWGm"></script>
<input type="text" id="text-input" placeholder="Digite seu texto aqui">
<button id="speak-button">Gerar Áudio</button>
<script>
    document.getElementById('speak-button').addEventListener('click', function() {
        let texto = document.getElementById('text-input').value;
        responsiveVoice.speak(texto, "Brazilian Portuguese Female" );
    })
</script>
Aqui eu tinha feito uma implementação usando a biblioteca responsivevoice.js, 
mas decidi mudar para usar a API do VoiceRSS porque eu percebi que o controller 
não iria fazer diferença nesse caso. E acredito que não seja está a intenção do teste.
Confesso que achei fácil demais dessa forma.
--> 