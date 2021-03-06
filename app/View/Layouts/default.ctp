<?php $usuario=$this->Session->read("Usuario"); ?>
<html lang='es_Es'>
    <head>
        <title>
            Sistrág: Sistema de información para el control de trabajos de grado I.U.CESMAG.
        </title>
        <meta charset="utf-8"/>
        <?php 
            echo $this->Html->meta('favicon.ico','app/webroot/img/iconos/favicon.ico',array('type' => 'icon'));
			echo $this->Html->css(array ('normalize','extjs')); 
            echo $this->Html->script(array('jquery','jquery.autosize'));
            echo $this->Js->writeBuffer(array('cache'=>true));
        ?>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    </head>
    <body>
        <header>
            <div id="logo" <?php if($logged_in)
            { ?> class="headerLogin" <?php } ?>>
                <figure>
                    <?php
                        echo $this->Html->image('iconos/logo64.png', array('alt' => 'Login','height' => '', 'width' => '32px'));
                    ?>
                    <figcaption>
                        <h2>SISTRÁG</h2>    
                    </figcaption>
                </figure>
                <div id="logo_skew_right">         
                    &nbsp;
                </div>
            </div>
            <?php
            if(!$logged_in)
            {
            ?>
            <div class="layout_titleLogout">
                <h1 class="titulo">
                   Sistema de información para el control de trabajos de grado
                </h1>
            </div>
            <?php
            }
            else
            {
            ?>
            <div class="layout_title">
                <h1 class="titulo">
                   Sistema de información para el control de trabajos de grado
                </h1>
            </div>  
            <?php
            }
            ?>
            <?php 
                echo $this->Session->Flash(); 
            ?>
            <?php  if($logged_in){ ?> 
            <div id="layout_usuario">
                <?php 
                $destino = WWW_ROOT."img/img_subida/usuarios/".$usuario['Persona']['id']."".DS;
                if (file_exists($destino))
                {
                $urlImagen="img_subida/usuarios/".$usuario['Persona']['id']."/1_400.png";
                }
                else
                {
                $urlImagen="recursos/escudo400.png";
                }                
                echo $this->Html->link($this->Html->image($urlImagen, array('height' => '', 'width' => '25px')), array('controller'=>'personas', 'action' => 'edit', $usuario['Persona']['id']),
                array('escape' => false)); 
                ?>
                <?php echo $this->Html->link('',array(
                    'controller'=>'users','action'=>'logout'),array(
                        'class' =>'icon-off','id'=>'salir'));}?>
            </div>
            <?php
            if(!$logged_in)
            {
            ?>
            <div id="layout_menu_inicio">
                <nav>
                    <ul>
                        <li id='primer_a_menu_inicio'>
                            <div id="logo_skew_left">      
                                &nbsp;
                            </div>
                            <?php
                                echo $this->Html->link('Inicio',array('controller'=>'users','action'=>'login'));                         
                            ?>
                        </li>
                        <li>
                            <?php
                                echo $this->Html->link('Desarrolladores',array('controller'=>'users','action'=>'login'));                         
                            ?>
                        </li>
                    </ul>
                </nav>
            </div>
            <?php
            }
            ?>
        </header>
            
                <?php
                if($this->Session->check("Menu")==true)
                {
                ?>
                    <nav class="layout_nav">
                        <div>
                            <ul>
                                <div id="lista">
                                    Menu
                                </div>
                                <?php
                                foreach($this->Session->read("Menu") as $i)
                                {
                                ?>
                                    <li>
                                        <?php 
                                        echo $this->Html->link(
                                        $this->Html->tag('span', "", array('class' => $i['icono'])).
                                        $this->Html->tag('span', $i['titulo'],array('class' => 'titulo')). "",
                                                $i['vinculo'],
                                                array('escape' => false)
                                             );
                                        ?> 

                                    </li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </nav>
                <?php
                } 
                else 
                {
                        //echo $this->html->link("Acceder","/menus/mnuMain/");
                }
                ?> 
            <?php
            if(!$logged_in)
            {
            ?>
            <section class="layout_contenido_inicial">
                    <?php 
                        echo $content_for_layout; 
                    ?>
            </section>
            <?php
            }else{
            ?>
            <section class="layout_contenido">
                <?php 
                    echo $content_for_layout; 
                ?>
            </section>
            <?php 
            }
            ?>

	<footer class="layout_footer">
    <div>
        <?php 
        echo $this->Html->link(
            $this->Html->tag('span', "", array('class' => "icon-facebook2")),
            "https://www.facebook.com/servioandres.pantojarosero",
                array('escape' => false,'target'=>'_blank')
        );
        ?> 
        <span>Servio Pantoja</span>
        <?php 
        echo $this->Html->link(
            $this->Html->tag('span', "", array('class' => "icon-twitter")),
            "https://twitter.com/ServioPantoja",
                array('escape' => false,'target'=>'_blank')
        );
        ?> 
         
        <?php 
        echo $this->Html->link(
            $this->Html->tag('span', "", array('class' => "icon-github")),
            "https://github.com/IngServioPantoja/Sistrag",
                array('escape' => false,'target'=>'_blank')
        );
        ?>  
    </div>
    <div>
        <?php 
        echo $this->Html->link(
            $this->Html->tag('span', "", array('class' => "icon-twitter")),
            "https://twitter.com/PFranciscoRojas",
                array('escape' => false,'target'=>'_blank')
        );
        ?>
        <span>Francisco Rojas</span>
        <?php 
        echo $this->Html->link(
            $this->Html->tag('span', "", array('class' => "icon-facebook2")),
            "https://www.facebook.com/francisco.rojas.54943600",
                array('escape' => false,'target'=>'_blank')
        );
        ?>
    </div>  
</footer>
<?php echo $this->Js->writeBuffer(); ?>
</body>
</html>