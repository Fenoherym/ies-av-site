@extends('template.app')

@section('title')
    A-propos
@endsection

@section('extra-css')
    <style>
        p{
            text-align: justify;
        }
        .content-block{
            padding: 0px 10px;
        }
        img{
            width: 100%;
        }

        .title{
          width: 100%;
          display: flex;
          justify-content: center;
          align-items: center;
          flex-direction: column;
        }


        .title h1{
              position: relative;
              font-weight: 400;
              letter-spacing: 2px;
              color: #111;
              font-size: 2.8em;
              text-transform: uppercase;
              text-align: center
        }


    </style>
@endsection

@section('content')

<div class="container mt-5 pt-5">
    <div class="content">
        <div class="title pb-5">
            <h1>Institut d'Enseignement Supérieur Antsirabe Vakinakaratra</h1>
        </div>
        <div class="row">
            <div class="col-md-6">
                <img src="{{ asset('img/slide/slide-2.jpg') }}" alt="">
            </div>
            <div class="col-md-6">
                <div class="content-block">
                    <h3>Historique</h3>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ab dolorum totam excepturi
                        harum voluptate corporis, omnis odio fuga voluptatum delectus sit est architecto saepe quo,
                            facilis ducimus quam consequuntur suscipit dignissimos in sunt hic id odit libero.
                            Reiciendis facilis ea odit nihil eius! Praesentium earum fugiat sint accusamus?
                            Officiis, ipsam itaque iusto, possimus debitis accusantium voluptates exercitationem fugiat accusamus,
                            aperiam obcaecati enim tempora doloremque? Necessitatibus repellendus quam sit aperiam soluta ut quasi eos
                            ratione, aliquam tempora sunt, facere in, amet nisi nesciunt rerum vitae asperiores aut reprehenderit sequi
                            ipsam.
                            Modi ullam fuga libero vel dolorem, sapiente perferendis veniam debitis assumenda?</p>
                </div>

            </div>
        </div>
        <div class="row mt-5">
            <div class="col-md-6">
               <div class="content-block">
                    <h3>Localisation</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt ullam veritatis sit recusandae odit? Molestiae quae, enim, sed dolorem eligendi, quas incidunt voluptate cupiditate blanditiis quo molestias distinctio illum reiciendis.
                    </p>
               </div>
               <div class="content-block">
                    <h3>Formation</h3>
                    <p>
                        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nesciunt ullam veritatis sit recusandae odit? Molestiae quae, enim, sed dolorem eligendi, quas incidunt voluptate cupiditate blanditiis quo molestias distinctio illum reiciendis.
                    </p>
                </div>
               <div class="content-block">
                    <h3>Formation</h3>
                    <p>
                        <i class="fa fa-phone"></i> 034 16 412 49
                    </p>
                    <p>
                        <a href="mailto:iesavscolarite@gmail.com" class="text-dark"><i class="fa fa-envelope"></i> iesavscolarite@gmail.com</a>
                    </p>
                </div>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15008.873128217965!2d47.02036145110861!3d-19.87300270848526!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x21e50fa2dc5b23f5%3A0xf2739d97da1f4450!2sIES-AV!5e0!3m2!1sfr!2smg!4v1648380251534!5m2!1sfr!2smg" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>

@endsection
