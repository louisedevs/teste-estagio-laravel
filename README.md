# 🎤 Conversor de Texto para Voz

Aplicação web desenvolvida em Laravel que converte texto digitado pelo usuário em áudio, utilizando a API VoiceRSS.

## 📋 Sobre o Projeto

Este projeto foi desenvolvido como teste técnico para estágio em Desenvolvimento Laravel + PHP. A aplicação permite que o usuário digite um texto e, através da integração com a API VoiceRSS, gera e reproduz o áudio correspondente em português brasileiro.

## 🚀 Tecnologias Utilizadas

- **Laravel 11.x** - Framework PHP
- **PHP 8.2+**
- **VoiceRSS API** - Text-to-Speech
- **HTML5/CSS3/JavaScript** - Interface do usuário

## 📦 Pré-requisitos

Antes de começar, certifique-se de ter instalado:

- PHP >= 8.2
- Composer
- MySQL ou outro banco de dados compatível
- Servidor web (Apache/Nginx) ou Laravel Valet/Laragon

## ⚙️ Instalação

### 1. Clone o repositório
```bash
git clone https://github.com/louisedevs/teste-estagio-laravel.git
cd teste-estagio-laravel
```

### 2. Instale as dependências
```bash
composer install
```

### 3. Configure o ambiente
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Configure a chave da API VoiceRSS

No arquivo `.env`, adicione sua chave da API:
```
VOICERSS_API_KEY=sua_chave_aqui
```

Para obter uma chave gratuita, acesse: https://www.voicerss.org/api/

### 5. Inicie o servidor
```bash
php artisan serve
```

A aplicação estará disponível em: `http://localhost:8000/text-to-speech`

## 💻 Como Usar

1. Acesse a aplicação pelo navegador
2. Digite o texto que deseja converter em áudio
3. Clique em "Gerar Áudio"
4. Aguarde o processamento (indicado por um spinner)
5. O áudio será reproduzido automaticamente

## 📂 Estrutura do Projeto
```
├── app/
│   └── Http/
│       └── Controllers/
│           └── TextToSpeechController.php  # Controller principal
├── routes/
│   └── web.php                             # Rotas da aplicação
├── resources/
│   └── views/
│       └── text-to-speech.blade.php        # Interface do usuário
└── public/
    └── css/
        └── styles.css                       # Estilos personalizados
```

## 🎯 Funcionalidades

- ✅ Conversão de texto para áudio em português brasileiro
- ✅ Interface minimalista e responsiva
- ✅ Feedback visual durante o processamento (loading spinner)
- ✅ Reprodução automática do áudio gerado
- ✅ Integração completa com API externa (VoiceRSS)

## 🛠️ Decisões Técnicas

Inicialmente, implementei a solução usando ResponsiveVoice.js (biblioteca JavaScript client-side). No entanto, percebi que essa abordagem não utilizava adequadamente o padrão MVC do Laravel, pois o Controller não processava nenhuma lógica.

Optei por refatorar para a API VoiceRSS, que permite o processamento no backend (PHP), demonstrando melhor uso do framework Laravel e suas boas práticas de desenvolvimento.

## 👨‍💻 Autor

**Louise Dias**
- GitHub: [@louisedevs](https://github.com/louisedevs)

## 📄 Licença

Este projeto foi desenvolvido para fins de avaliação técnica.