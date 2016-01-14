<?php
	/*
		Template Name: PortfolioMasonry
	*/
?>

<?php get_header(); ?>



<style>

	.v-aln-wr { position: relative; width: 100%; height: 100%; display: table; }
	.v-aln { display: table-cell; vertical-align: middle; }
	.viewport, .slideshow, .slide, .bsz, div.scroll, .dotpat, .slide .v-aln-wr, .bsz a.newslink, .screenshots .imageblock .video, .showme, .thumnails-filter-hold { position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; }
	.slideshow .logo, .slide0 .logo { position: absolute; left: 9em; top: 4em; height: 4.2em; z-index: 3; }
	.slide .v-aln-wr { background: transparent url('undefined') repeat scroll 0% 0%; }
	/* .logo img { height: 100%; } */
	.bsz { background: no-repeat scroll 50% 0px / cover ; }
	.bsz img { display: none; }
	.bannertext { margin-left: 9em; padding-top: 6em; text-transform: uppercase; color: rgb(255, 255, 255); position: relative; }
	.slide:first-child .bannertext { display: block; }
	.bannertext h1 { font-size: 12.25em; line-height: 0.8; font-weight: 300; }
	.bannertext p { font-size: 2.6em; position: relative; line-height: 1.2; margin-top: 1em; }
	.view { padding: 0.65em 2em; font-size: 1.2em; margin-top: 1.5em; display: inline-block; text-transform: uppercase; line-height: 1; font-style: normal; transition: all 0.4s ease 0s; }
	.workthumb .view { font-size: 2em; }
	.view { background: rgb(70, 171, 178) none repeat scroll 0% 0%; color: rgb(255, 255, 255); }
	.view:hover { background: rgb(34, 34, 34) none repeat scroll 0% 0%; }
	.workthumb .view:hover { color: rgb(68, 68, 68); background: rgb(255, 255, 255) none repeat scroll 0% 0%; border-color: rgb(68, 68, 68); }

	.showme .blacklogo { position: absolute; left: 4.11em; top: 50%; margin-top: -0.85em; display: none; }
	.blacklogo img { height: 1.7em; }
	.thumbnails-holder, .fluid-grid, .screenshots { position: relative; height: 0px; margin: 3em 7px 0px; z-index: 3; overflow: hidden; }
	.thumbnails-holder { height: auto; }
	.thumnails-filter-hold { z-index: 2; background: rgb(255, 255, 255) none repeat scroll 0% 0%; }
	.workthumb { transition: top 1s ease 0.2s, left 1s ease 0.2s, transform 0.6s ease 0.2s; transform: scale(1); }
	.fluid-grid { margin: 0px; }
	.workthumb, .screenshots .imageblock { display: block; position: absolute; }
	.workthumb { padding: 7px; }
	.workthumb > .rel { width: 100%; height: 100%; }
	.workthumb img { background: rgb(213, 213, 213) none repeat scroll 0% 0%; width: 100%; height: 100%; }
	.workthumb a { position: absolute; top: 0px; left: 0px; width: 100%; height: 100%; background: rgba(0, 0, 0, 0.65) none repeat scroll 0% 0%; vertical-align: middle; text-align: center; opacity: 0; transition: opacity 0.5s ease-in-out 0s; }
	.workthumb:hover a { opacity: 1; }
	.workthumb a span { position: relative; z-index: 2; vertical-align: middle; }
	.workthumb span.name { position: relative; z-index: 10; color: rgb(255, 255, 255); text-transform: uppercase; font-size: 2em; padding: 2em 2em 0px; display: block; line-height: 1; }
	span.v-pos { display: inline-block; width: 1%; height: 100%; }
	.filters { margin: 3em 4em 0px; position: relative; z-index: 4; }
	.work .filters { margin: 1em 0px 0px; padding-top: 2em; }
	.filter { padding: 0.5em 2.5em; border: 1px solid rgb(68, 68, 68); display: inline-block; font-size: 2em; background-color: rgb(255, 255, 255); color: rgb(68, 68, 68); transition: all 0.4s ease-in-out 0s; }
	.filter:hover { background-color: rgb(68, 68, 68); color: rgb(255, 255, 255); }
	.showme { text-align: center; padding: 2em 0px; height: auto; background-color: rgb(255, 255, 255); }
	.showme .taglist { position: absolute; left: 0px; top: 100%; width: 100%; background: rgba(20, 20, 20, 0.97) none repeat scroll 0% 0%; padding: 68px 0px; display: none; }
	.showme .taglist .actions a { display: block; padding: 12px 0px; color: rgb(95, 95, 95); text-transform: uppercase; }
	.showme .taglist .actions a:hover, .showme .taglist .actions a.select { color: rgb(255, 255, 255); }
	.showme .taglist .actions a span { font-size: 17px; letter-spacing: 2px; }
	.showme .taglist .actions a:first-child { margin-top: 56px; }
	.showme .taglist .lines { padding-top: 56px; text-align: center; }
	.showme .taglist .lines a { display: inline-block; width: 42px; }
	.showme .taglist .lines span { width: 42px; height: 2px; background: rgb(255, 255, 255) none repeat scroll 0% 0%; margin: 14px auto 0px; display: inline-block; }
	.showme .taglist .lines span:first-child { margin-top: 0px; }


	.clients { margin-top: 12em; padding: 10em 0px; }
	.clients .bsz { background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/bg_001.jpg'); }
	.clients .c img { width: 100%; height: auto; }
	.wid100 { width: 100%; }
	.button .view::before, .button .view::after { content: ""; width: 30px; height: 100%; background-color: rgb(255, 255, 255); position: absolute; left: 100%; top: 0px; }
	.button .view::before { right: 100%; left: auto; }
	.clients, .clients .c, .footer, .footer .c { position: relative; }
	.about-text .text, .about-page .section, .showme, .first-level, .news-item, .news-images, .news-text, .row .submit-wr, .row input[type="submit"], .content-wr, .f-l, .f-r, .submit-wr::after, .c, .workthumb, .workthumb a span.name, .who .f-l p, .odd1, .odd0 { box-sizing: border-box; }
	h3, h4, .textleft p, .aboutintro p, .abouttext .f-l strong, .f-menu a { font-family: "Source Sans Pro",sans-serif; font-weight: 700; }
	.who .f-l p, .services-item p, .textright, .abouttext .f-l, .news-attr, .news-text p, .text p { font-family: "Source Sans Pro",sans-serif; font-style: italic; }
	.branding, .menu .social a, .workthumb span.name, .office-item a span.address { font-family: "Source Sans Pro",sans-serif; }
	.workthumb span.name { font-family: "Source Sans Pro",sans-serif; font-weight: 600; letter-spacing: 1px; }
	.menu .pagenav a, .menu .offices a { font-family: "Source Sans Pro",sans-serif; font-weight: 800; letter-spacing: 2px; }
	.slide h1, .middle-text, .office-item { font-family: "Open Sans",sans-serif; }


	.showme.fix { font-size: 7px ! important; }
	.showme { text-align: left; padding-left: 2em; }
	.showme .taglist { text-align: center; padding: 0px; overflow: auto; height: 100vh; top: 0px; }
	.showme .taglist .tag-close { padding-top: 35px; }
	.showme .taglist .actions a:first-child { margin-top: 23px; }
	.showme .taglist .tag-close img { height: 25px; }
	.showme .taglist .lines { padding: 23px 0px 35px; }

	.work .filters, .who .f-l p.p1 { margin-top: 0px; }
	.thumbnails-holder, .screenshots { margin: 2em 2em 0px; }
	.clients { margin-top: 6em; }

</style>




<div id="blog-fullwidth" style="background: #333;color#FFF;">

<!--
	<section class="container pagewrap">
		<div class="row">
			<div class="col-md-12">
-->



				<div class="work">

					<!-- / FILTER BUTTON & LINKS -->
				    <div class="filters">
				        <a class="filter trigger" style="visibility: hidden;">FILTER</a>
				        <div class="showme">
				            <a class="filter trigger">FILTER WORK</a>

				            <div style="display: none;" class="taglist">
				                <div class="tag-close">
				                    <a><img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/tag-close.png"></a>
				                </div>
				                <div class="actions">
					                <a class="tag" data-id="9"><span>Photography</span></a>
					                <a class="tag" data-id="10"><span>Digital</span></a>
					                <a class="tag" data-id="11"><span>Branding</span></a>
					                <a class="tag" data-id="2"><span>Digital</span></a>
					                <a class="tag" data-id="1"><span>Branding</span></a>
					                <a class="tag" data-id="3"><span>Campaign</span></a>
					                <a class="tag" data-id="5"><span>Print</span></a>
					                <a class="tag" data-id="4"><span>Social Media</span></a>
				                </div>
				                <div class="lines">
				                    <a class="equal">
				                        <span></span>
				                        <span></span>
				                    </a>
				                </div>
				            </div>  <!-- / taglist -->

				        </div>
				    </div>	<!-- / filters -->



					<!-- / THUMB HOLDER -->
				    <div class="thumbnails-holder rel" data-masonry-options='{ "itemSelector": ".workthumb", "columWidth": 200 }'>
				        <div style="height: 3208px;" class="thumbnails fluid-grid">

				            <div class="workthumb" data-top="0" id="0" data-colspan="1" data-rowspan="1" data-belongs="#9#3#5#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1415379025_3_f4568362aa89a91f9f64569e96fc2dca_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1415379025_3_f4568362aa89a91f9f64569e96fc2dca_3.jpg" alt="Jason Sadourian">
									</div>
									<a href="http://quintessentiallycreative.com/work/jason-sadourian">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Jason Sadourian</span>
								</div>
				            </div>

				            <div class="workthumb" data-top="0"  id="1" data-colspan="2" data-rowspan="1" data-belongs="#2#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409774_41_21df939d7a5387a13588cd02cab65ead_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409774_41_21df939d7a5387a13588cd02cab65ead_1.jpg" alt="Aston Martin">
									</div>
									<a href="http://quintessentiallycreative.com/work/aston-martin">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Aston Martin</span>
								</div>
				            </div>

				            <div data-top="0" id="2" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#2#5#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409404_39_21df939d7a5387a13588cd02cab65ead_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409404_39_21df939d7a5387a13588cd02cab65ead_1.jpg" alt="Red Carnation Hotels Magazine">
									</div>
									<a href="http://quintessentiallycreative.com/work/red-carnation-hotels-magazine">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Red Carnation Hotels Magazine</span>
								</div>
				            </div>

				            <div data-top="401" id="3" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#10#11#5#4#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409554_40_6fbf94bfb4024acf7a94f230e076f332_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409554_40_6fbf94bfb4024acf7a94f230e076f332_1.jpg" alt="SAMSUNG">
									</div>
									<a href="http://quintessentiallycreative.com/work/samsung">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">SAMSUNG</span>
								</div>
				            </div>

				            <div data-top="802" id="4" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#5#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409900_42_00534d1142ea10ef357d4013b66fc3b4_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407409900_42_00534d1142ea10ef357d4013b66fc3b4_1.jpg" alt="Gentleman">
									</div>
									<a href="http://quintessentiallycreative.com/work/gentleman">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Gentleman</span>
								</div>
				            </div>

				            <div data-top="0" id="5" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#2#1#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407411182_53_21df939d7a5387a13588cd02cab65ead_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407411182_53_21df939d7a5387a13588cd02cab65ead_1.jpg" alt="Le Besoin">
									</div>
									<a href="http://quintessentiallycreative.com/work/le-besoin">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Le Besoin</span>
								</div>
				            </div>

				            <div data-top="802" id="6" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#5#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407411153_52_c3c245149eb897e97b4d35dc79822879_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407411153_52_c3c245149eb897e97b4d35dc79822879_1.jpg" alt="Quintessentials ">
									</div>
									<a href="http://quintessentiallycreative.com/work/quintessentials">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Quintessentials </span>
								</div>
				            </div>

				            <div data-top="1203" id="7" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#10#3#9#4#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410223_46_21df939d7a5387a13588cd02cab65ead_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410223_46_21df939d7a5387a13588cd02cab65ead_1.jpg" alt="BAKE BOUTIQUE">
									</div>
									<a href="http://quintessentiallycreative.com/work/bake-boutique">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">BAKE BOUTIQUE</span>
								</div>
				            </div>

				            <div data-top="1203" id="8" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#10#11#3#9#5#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410351_47_80f6957f3b12b6d9b61ba3d75c050bd3_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410351_47_80f6957f3b12b6d9b61ba3d75c050bd3_1.jpg" alt="Rosalina">
									</div>
									<a href="http://quintessentiallycreative.com/work/rosalina">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Rosalina</span>
								</div>
				            </div>

				            <div data-top="1604" id="9" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#2#1#3#5#4#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410611_49_d82319912041449cd31bdb7e7569d171_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410611_49_d82319912041449cd31bdb7e7569d171_1.jpg" alt="Urban Cloud">
									</div>
									<a href="http://quintessentiallycreative.com/work/urban-cloud">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Urban Cloud</span>
								</div>
				            </div>

				            <div data-top="1604" id="10" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#11#10#3#5#9#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410763_50_72c4f920ed74caaf2cd6cc492a23c041_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410763_50_72c4f920ed74caaf2cd6cc492a23c041_1.jpg" alt="Q VODKA">
									</div>
									<a href="http://quintessentiallycreative.com/work/q-vodka">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Q VODKA</span>
								</div>
				            </div>

				            <div data-top="2005" id="11" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#3#9#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410913_51_d82319912041449cd31bdb7e7569d171_1.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1407410913_51_d82319912041449cd31bdb7e7569d171_1.jpg" alt="MIKKEL RUSSEL">
									</div>
									<a href="http://quintessentiallycreative.com/work/mikkel-russel">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">MIKKEL RUSSEL</span>
								</div>
				            </div>

				            <div data-top="802" id="12" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#9#10#11#3#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408537790_7_ed5ad78958d824568ff5ff9d0798a3ee_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408537790_7_ed5ad78958d824568ff5ff9d0798a3ee_3.jpg" alt="QUINTESSENTIALLY SPORT">
									</div>
									<a href="http://quintessentiallycreative.com/work/quintessentially-sport">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">QUINTESSENTIALLY SPORT</span>
								</div>
				            </div>

				            <div data-top="2005" id="13" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#3#9#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408538065_12_13c60cd75035300bef0e72c2ba11d8cf_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408538065_12_13c60cd75035300bef0e72c2ba11d8cf_3.jpg" alt="LIONEL DELUY">
									</div>
									<a href="http://quintessentiallycreative.com/work/lionel-deluy">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">LIONEL DELUY</span>
								</div>
				            </div>

							<div data-top="2406" id="14" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#1#3#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408537170_2_0a3ed915d72c6c36fda5ed16890d22ee_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408537170_2_0a3ed915d72c6c36fda5ed16890d22ee_3.jpg" alt="Mark Giusti">
									</div>
									<a>
										<span class="view">COMING SOON</span><span class="v-pos"></span>
									</a>
									<span class="name">Mark Giusti</span>
								</div>
				            </div>

							<div data-top="2005" id="15" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408540859_26_7d12c99c08c9a21a5c52b9ea054f78e7_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408540859_26_7d12c99c08c9a21a5c52b9ea054f78e7_3.jpg" alt="VAGHEGGI BEAUTY">
									</div>
									<a>
										<span class="view">COMING SOON</span><span class="v-pos"></span>
									</a>
									<span class="name">VAGHEGGI BEAUTY</span>
								</div>
				            </div>

				            <div data-top="2406" id="16" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1411115897_23_2a10b20fec03292e0bcb553a56d2b7ec_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1411115897_23_2a10b20fec03292e0bcb553a56d2b7ec_3.jpg" alt="Rosalina">
									</div>
									<a href="http://quintessentiallycreative.com/work/rosalina">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">Rosalina</span>
								</div>
				            </div>

				            <div data-top="2807" id="17" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1411110900_2_91426bc7ce1f39996ef04b8b0ba782ac_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1411110900_2_91426bc7ce1f39996ef04b8b0ba782ac_3.jpg" alt="La Roache Brothers">
									</div>
									<a href="http://quintessentiallycreative.com/work/la-roache-brothers">
										<span class="view">VIEW PROJECT</span><span class="v-pos"></span>
									</a>
									<span class="name">La Roache Brothers</span>
								</div>
				            </div>


				            <div data-top="2807" id="18" class="workthumb" data-colspan="1" data-rowspan="1" data-belongs="#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408540893_27_91f2c821e2829113b5c59269ed564c23_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408540893_27_91f2c821e2829113b5c59269ed564c23_3.jpg" alt="VESTRA WEALTH">
									</div>
									<a>
										<span class="view">COMING SOON</span><span class="v-pos"></span>
									</a>
									<span class="name">VESTRA WEALTH</span>
								</div>
				            </div>

				            <div data-top="2807"  id="19" class="workthumb" data-colspan="2" data-rowspan="1" data-belongs="#">
								<div class="rel">
									<div class="bsz" style="background-image: url('<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408537998_11_93785c98327de7b6b84da03a542bbc95_3.jpg');">
										<img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1408537998_11_93785c98327de7b6b84da03a542bbc95_3.jpg" alt="QUINTESSENTIALLY ESTATES">
									</div>
									<a>
										<span class="view">COMING SOON</span><span class="v-pos"></span>
									</a>
									<span class="name">QUINTESSENTIALLY ESTATES</span>
								</div>
				            </div>

						</div>
				        <div class="thumnails-filter-hold"></div>
				    </div> <!-- thumbnails-holder  -->
				</div>	<!-- work  -->


				<!-- Additional Clients Image -->
				<div class="clients" style="overflow: hidden;">
					<div class="bsz">
				        <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/bg.jpg" alt="Background">
					</div>
				    <div class="c">
				        <img src="<?php echo get_template_directory_uri(); ?>/images/portfolio/file_1412086494_1_9b83ea7f459576c8388f13401133ee52_2.png" alt="Clients">
				    </div>
				</div>	<!-- /clients	-->













<!--
			</div>
		</div>
	</section>
-->
	<!-- container -->

</div>



<!-- Load Masonry Scripts -->
<!-- <script type="text/javascript" src="jquery.js"></script> -->
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/js/portfolio/jquery.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/js/portfolio/jquery-ui.min.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/js/portfolio/jquery.grid.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/js/portfolio/masonry.js"></script>
<script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/inc/js/portfolio/port-scripts.js"></script>





<?php get_footer(); ?>