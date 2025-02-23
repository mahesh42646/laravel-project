@extends('layouts.landing-page.master')
@section('title') {{ config('app.name') }} @endsection

@section('content')

  <!-- Banner-Section-Start -->
  <section class="banner_section mb-5">
    <!-- container start -->
    <div class="container">
      
      <div class="row">
        <div class="col-lg-7 col-md-12" data-aos="fade-up" data-aos-duration="1500">
          
          <div class="banner_text">
            <h1 class="mb-0" style="line-height: 1;">Solução inteligente para</h1>
            <h1 class="font-weight-bold mb-0" style="line-height: 1; color: var(--primery)"><span>gestão de editais culturais</span></h1>
            <h2 class="font-weight-bolder" style="line-height: 1;">e execução de leis de incentivo à cultura</h2>
          </div>

          <!-- users -->
          <div class="used_app">
            <ul>
              <li><img src="{{ asset('images/landing-page/banavt1.webp') }}" alt="image"></li>
              <li><img src="{{ asset('images/landing-page/banavt2.webp') }}" alt="image"></li>
              <li><img src="{{ asset('images/landing-page/banavt3.webp') }}" alt="image"></li>
              <li><img src="{{ asset('images/landing-page/play.svg') }}" alt="img"></li>
            </ul>
            <h3>1 mil + Usuários ativos</h3>
          </div>

          <h3 class="font-weight-bold mb-3">Você é Prefeitura ou Assessoria ?</h3>

          <!-- app buttons -->
          <ul class="app_btn">
            <li class="ml-0">
              <a href="https://api.whatsapp.com/send?phone=5583999338953" target="_blank" class="text-white" style="font-size: 19px">Solicitar Demonstração Gratuita</a>
            </li>
          </ul>
        </div>

        <!-- banner slides start -->
        <div class="col-lg-5 col-md-12" >
          <div class="">
            <div class="d-flex justify-content-end">
              <img src="{{ asset('images/landing-page/bigstar.webp') }}" loading="lazy" alt="image">
            </div>

            <div class="">
              <img src="{{ asset('images/landing-page/banner-home.webp') }}" loading="lazy" class="img-fluid" alt="image">
            </div>
            <div class="d-flex justify-content-start">
              <img src="{{ asset('images/landing-page/smallStar.webp') }}" loading="lazy" alt="image">
            </div>
          </div>
        </div>
      </div>

      <!-- Spin Diveder Start -->
      <div class="spinBlock" data-aos="fade-up" data-aos-duration="1500">
        <span class="star"><img src="{{ asset('images/landing-page/smallStar.webp') }}" loading="lazy" alt="image"></span>
        <div class="spin_box" id="scrollButton">
          <span class="downsign">
            <i class="icofont-long-arrow-down"></i>
          </span>
          <div class="spin-text">
            <img src="{{ asset('images/landing-page/12mtext.webp') }}" loading="lazy" alt="image">
          </div>
        </div>
        <span class="star"><img src="{{ asset('images/landing-page/smallStar.webp') }}" loading="lazy" alt="image"></span>
      </div>
      <!-- Spin Diveder End -->
    </div>
  </section>

   <!-- SESSAO 3 PASSOS -->
   <section class="how_it_section white_text">
    <div class="how_it_inner" data-aos="fade-in" data-aos-duration="1500">
      <div class="dotes_blue"><img src="{{ asset('images/landing-page/blue_dotes.webp') }}" loading="lazy" alt="image"></div>
      <div class="container">
        <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
          <span class="title_badge">Rápido & fácil</span>
          <h2>Como funciona em 3 passos</h2>
        </div>
        <div class="row">
          <div class="col-md-4">
            <div class="steps_block step_border" data-aos="fade-up" data-aos-duration="1500">
              <div class="steps">
                <div class="icon">
                  <img src="{{ asset('images/landing-page/howstep1.webp') }}" loading="lazy" alt="image">
                </div>
                <div class="text">
                  <h3>Publique</h3>
                  <span class="tag_text" style="line-height: 1.3;">Crie e publique a divulgação <br> do seu edital</span>
                </div>
              </div>
              <span class="step">01</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="steps_block step_border" data-aos="fade-up" data-aos-duration="1500">
              <div class="steps">
                <div class="icon">
                  <img src="{{ asset('images/landing-page/howstep2.webp') }}" loading="lazy" alt="image">
                </div>
                <div class="text">
                  <h3>Avalie</h3>
                  <span class="tag_text" style="line-height: 1.3;">Avaliação objetiva e seleção dos projetos <br> mais promissores</span>
                </div>
              </div>
              <span class="step">02</span>
            </div>
          </div>
          <div class="col-md-4">
            <div class="steps_block" data-aos="fade-up" data-aos-duration="1500">
              <div class="steps">
                <div class="icon">
                  <img src="{{ asset('images/landing-page/howstep3.webp') }}" loading="lazy" alt="image">
                </div>
                <div class="text">
                  <h3>Monitore</h3>
                  <span class="tag_text" style="line-height: 1.3;">Acompanhe a execução dos <br> projetos</span>
                </div>
              </div>
              <span class="step">03</span>
            </div>
          </div>
        </div>
        <div class="text-center">
          <div class="btn_block">
            <a href="https://api.whatsapp.com/send?phone=5583999338953" class="btn puprple_btn ml-0" target="_blank">Solicitar Demonstração Gratuita</a>
            <div class="btn_bottom"></div>
          </div>
        </div>
      </div>
    </div>
  </section>

   <!-- Service Section Start -->
   <section class="row_am service_section">
    <div class="container">
      <div class="section_title" data-aos="fade-up" data-aos-duration="1500">
        <span class="title_badge mb-1">Serviços</span>
        <h2>Todas as <span>ferramentas</span><br> que você precisa em um só lugar</h2>
      </div>
      <div class="row service_blocks">
        <div class="col-md-6">
          <div class="service_text" data-aos="fade-up" data-aos-duration="1500">
            <div class="service_badge"><i class="icofont-tasks-alt"></i>
              <span>Módulo 1</span>
            </div>
            <h2><span>Processo de</span> inscrição <br> de projetos</h2>
            <p>
              Uma ferramenta estruturada e transparente para os 
              proponentes submeterem suas ideias, permitindo uma 
              avaliação objetiva e a seleção dos projetos mais promissores 
              para financiamento ou implementação.
            </p>
            <ul class="listing_block">
              <li>
                <div class="icon">
                  <span><i class="icofont-ui-check"></i></span>
                </div>
                <div class="text">
                  <h3>Identificação de proponente</h3>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-ui-check"></i></span>
                </div>
                <div class="text">
                  <h3>Identificação de projetos</h3>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-ui-check"></i></span>
                </div>
                <div class="text">
                  <h3>Comunicação dentro do painel</h3>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-ui-check"></i></span>
                </div>
                <div class="text">
                  <h3>Download de todos os arquivos</h3>
                </div>
              </li>
            </ul>
            <div class="btn_block">
              <a href="https://api.whatsapp.com/send?phone=5583999338953" class="btn puprple_btn ml-0" target="_blank">Solicitar Demonstração Gratuita</a>
              <div class="btn_bottom"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img" data-aos="fade-up" data-aos-duration="1500">
            <img src="{{ asset('images/landing-page/service1.webp') }}" loading="lazy" alt="image">
          </div>
        </div>
      </div>
      <div class="row service_blocks flex-row-reverse">
        <div class="col-md-6">
          <div class="service_text right_side" data-aos="fade-up" data-aos-duration="1500">
            <div class="service_badge"><i class="icofont-ui-clock"></i>
              <span>Módulo 2</span>
            </div>
            <h2><span>Gerenciamento de</span><br> Projetos e Editais</h2>
            <p>
              Estrutura organizada e eficiente para planejar, executar 
              e monitorar iniciativas, garantindo que sejam concluídas 
              dentro do prazo, do orçamento e dos requisitos 
              estabelecidos, enquanto maximiza o aproveitamento 
              dos recursos disponíveis.
            </p>
            <ul class="feature_list">
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Avaliações de projetos</p>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Gestão de contratos</p>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Termo de execução</p>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Prestação de contas</p>
                </div>
              </li>
            </ul>
            <div class="btn_block">
              <a href="https://api.whatsapp.com/send?phone=5583999338953" class="btn puprple_btn ml-0" target="_blank">Solicitar Demonstração Gratuita</a>
              <div class="btn_bottom"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img" data-aos="fade-up" data-aos-duration="1500">
            <img src="{{ asset('images/landing-page/service2.webp') }}" loading="lazy" alt="image">
          </div>
        </div>
      </div>
      <div class="row service_blocks">
        <div class="col-md-6">
          <div class="service_text" data-aos="fade-up" data-aos-duration="1500">
            <div class="service_badge"><i class="icofont-list"></i> <span>Módulo 3</span></div>
            <h2><span>Planejamento</span> Estratégico</h2>
            <p>
              Fornecer insights e análises que auxiliem os gestores na 
              tomada de decisões estratégicas, identificando 
              tendências, áreas de oportunidade e melhores práticas 
              para aprimorar a gestão de editais e projetos culturais.
            </p>
            <ul class="feature_list">
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Mapeamento de entidades</p>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Mapeamento de artistas</p>
                </div>
              </li>
              <li>
                <div class="icon">
                  <span><i class="icofont-check-circled"></i></span>
                </div>
                <div class="text">
                  <p>Mapeamento de empreendedores culturais</p>
                </div>
              </li>
            </ul>
            <div class="btn_block">
              <a href="https://api.whatsapp.com/send?phone=5583999338953" class="btn puprple_btn ml-0" target="_blank">Solicitar Demonstração Gratuita</a>
              <div class="btn_bottom"></div>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="img" data-aos="fade-up" data-aos-duration="1500">
            <img src="{{ asset('images/landing-page/service3.webp') }}" loading="lazy" alt="image">
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- Task-App-Section-Start -->
  <section class="row_am task_app_section">
    <!-- Task Block start -->
    <div class="task_block">
      <div class="dotes_blue"><img src="{{ asset('images/landing-page/blue_dotes.webp') }}" loading="lazy" alt="image"></div>
      <!-- row start -->
      <div class="row">
        <div class="col-md-6">
          <!-- task images -->
          <div class="task_img" data-aos="fade-in" data-aos-duration="1500">
            <div class="frame_img">
              <img src="{{ asset('images/landing-page/feature1a.webp') }}" loading="lazy" alt="image">
            </div>
            <div class="screen_img">
              <img class="moving_animation" src="{{ asset('images/landing-page/feature1b.webp') }}" loading="lazy" alt="image">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- task text -->
          <div class="task_text">
            <div class="section_title white_text" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
              <span class="title_badge">Recursos exclusivos</span>
              <span class="icon">
                <img src="{{ asset('images/landing-page/feature-icon1.webp') }}" loading="lazy" alt="image">
              </span>
              <h2>Emissão de Documentação Legal:</h2>    
              <p>
                &#8226;&nbsp; Geração automatizada de contratos, termos de compromisso, e outros 
                documentos legais necessários para formalizar o apoio aos projetos culturais.
              </p>
              <p>
                &#8226;&nbsp; Emissão de certificados de participação, comprovantes de execução, e 
                outros documentos exigidos pelas leis de incentivo à cultura.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- row end -->
    </div>
    <!-- Task Block end -->
    <!-- Task Block start -->
    <div class="task_block">
      <div class="dotes_blue"><img src="{{ asset('images/landing-page/blue_dotes.webp') }}" loading="lazy" alt="image"></div>
      <!-- row start -->
      <div class="row">
        <div class="col-md-6">
          <!-- task images -->
          <div class="task_img" data-aos="fade-in" data-aos-duration="1500">
            <div class="frame_img">
              <img src="{{ asset('images/landing-page/feature2a.webp') }}" loading="lazy" alt="image">
            </div>
            <div class="screen_img">
              <img class="moving_animation" src="{{ asset('images/landing-page/feature2b.webp') }}" loading="lazy" alt="image">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- task text -->
          <div class="task_text">
            <div class="section_title white_text" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
              <span class="title_badge">Recursos exclusivos</span>
              <span class="icon">
                <img src="{{ asset('images/landing-page/feature-icon2.webp') }}" loading="lazy" alt="image">
              </span>
              <!-- h2 -->
              <h2>Acompanhamento e Avaliação de Projetos</h2>
              <!-- p -->
              <p>
                &#8226;&nbsp; Ferramentas para acompanhar a execução dos projetos culturais, 
                incluindo relatórios de progresso, registro de despesas, e análise de 
                resultados alcançados.
              </p>
              <p>
                &#8226;&nbsp; Avaliação do impacto dos projetos apoiados, com indicadores de 
                desempenho e métricas de sucesso definidas previamente.
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- row end -->
    </div>
    <!-- Task Block end -->
    <!-- Task Block start -->
    <div class="task_block">
      <div class="dotes_blue"><img src="{{ asset('images/landing-page/blue_dotes.webp') }}" loading="lazy" alt="image"></div>
      <!-- row start -->
      <div class="row">
        <div class="col-md-6">
          <!-- task images -->
          <div class="task_img" data-aos="fade-in" data-aos-duration="1500">
            <div class="frame_img">
              <img src="{{ asset('images/landing-page/feature3a.webp') }}" loading="lazy" alt="image">
            </div>
            <div class="screen_img">
              <img class="moving_animation" src="{{ asset('images/landing-page/feature3b.webp') }}" loading="lazy" alt="image">
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <!-- task text -->
          <div class="task_text">
            <div class="section_title white_text" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="100">
              <span class="title_badge">Recursos exclusivos</span>
              <span class="icon">
                <img src="{{ asset('images/landing-page/feature-icon3.webp') }}" loading="lazy" alt="image">
              </span>
              <!-- h2 -->
              <h2>Relatórios e Prestação de Contas</h2>
              <!-- p -->
              <p>
                &#8226;&nbsp; Geração de relatórios consolidados sobre a execução dos projetos 
                culturais apoiados, incluindo informações financeiras, impacto social, e 
                benefícios gerados para a comunidade.
              </p>
              <p>
                &#8226;&nbsp; Prestação de contas conforme exigido pelas leis de incentivo à cultura e órgãos reguladores.                
              </p>
            </div>
          </div>
        </div>
      </div>
      <!-- row end -->
    </div>
    <!-- Task Block end -->
  </section>

  <!-- Positive Reviews Section Start -->
  <section class="review_section row_am">
    <div class="container">
      <div class="positive_inner">
        <div class="row">
          <div class="col-md-6 pr-0 sticky-top">
            <div class="sidebar_text" data-aos="fade-up" data-aos-duration="1500">
              <div class="section_title text-left">
                <span class="title_badge">Avaliações</span>
                <h2><span>Avaliações positivas</span><br> dos nossos clientes</h2>
              </div>
              <div class="google_rating">
                <div class="star">
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                  <span><i class="icofont-star"></i></span>
                </div>
                <p>4.5/5.0 Avaliado em <img class="img-fluid" src="{{ asset('images/landing-page/google.webp') }}" loading="lazy" alt="image"></p>
              </div>
              <div class="user_review">
                <p>1399 <a href="#">Total de avaliações <i class="icofont-arrow-right"></i></a></p>
              </div>
              <div class="smiley_icon"><img src="{{ asset('images/landing-page/smily.webp') }}" loading="lazy" alt="image"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="review_side">
              <div class="review_block" data-aos="fade-up" data-aos-duration="1500">
                <div class="coustomer_info">
                  <div class="avtar">
                    <img src="{{ asset('images/landing-page/review1.webp') }}" loading="lazy" alt="image">
                    <div class="text">
                      <h3>José Maria</h3>
                      <span>Secretário de Cultura</span>
                    </div>
                  </div>
                  <div class="star">
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                  </div>
                </div>
                <p>
                  Este sistema tornou o processo de submissão de projetos culturais 
                  incrivelmente eficiente e transparente. A facilidade de uso e a 
                  clareza nas informações fornecidas nos permitiram navegar pelo 
                  processo com confiança, sabendo que nossas propostas estavam 
                  sendo tratadas de forma justa e imparcial.
                </p>
              </div>
              <div class="review_block" data-aos="fade-up" data-aos-duration="1500">
                <div class="coustomer_info">
                  <div class="avtar">
                    <img src="{{ asset('images/landing-page/review2.webp') }}" loading="lazy" alt="image">
                    <div class="text">
                      <h3>Professor Dênis</h3>
                      <span>Diretor de Cultura</span>
                    </div>
                  </div>
                  <div class="star">
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                  </div>
                </div>
                <p>
                  Estamos impressionados com o suporte excepcional oferecido pela 
                  equipe por trás deste sistema. Sempre que enfrentamos alguma 
                  dúvida ou problema técnico, fomos prontamente atendidos por uma 
                  equipe dedicada e experiente, que nos ajudou a resolver qualquer 
                  obstáculo que encontramos. Isso fez toda a diferença para nós.
                </p>
              </div>
              <div class="review_block" data-aos="fade-up" data-aos-duration="1500">
                <div class="coustomer_info">
                  <div class="avtar">
                    <img src="{{ asset('images/landing-page/review3.webp') }}" loading="lazy" alt="image">
                    <div class="text">
                      <h3>Maria</h3>
                      <span>Diretora de Cultura</span>
                    </div>
                  </div>
                  <div class="star">
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                    <span><i class="icofont-star"></i></span>
                  </div>
                </div>
                <p>
                  A funcionalidade de prestação de contas deste sistema é uma 
                  verdadeira bênção. Conseguimos facilmente gerar relatórios 
                  detalhados sobre a execução de nossos projetos culturais, o que 
                  nos permitiu cumprir nossas obrigações legais sem o estresse usual 
                  associado à documentação. Isso nos deu mais tempo para nos 
                  concentrarmos no trabalho criativo.
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

@endsection

@section('scripts')
  <script>
    // Fixed Discount Dish JS
    $(document).ready(function () {
      let cardBlock = document.querySelectorAll('.task_block');
      let topStyle = 120;

      cardBlock.forEach((card) => {
        card.style.top = `${topStyle}px`;
        topStyle += 30;
      })

    });

    // Scroll Down Window 
    $(document).ready(function () {
      // Attach a click event handler to the button
      $('#scrollButton').click(function () {
        // Scroll down smoothly 200 pixels from the current position
        $('html, body').animate({ scrollTop: $(window).scrollTop() + 600 }, 800); // Adjust the speed (800ms) as needed
      });
    });

  </script>
@endsection
