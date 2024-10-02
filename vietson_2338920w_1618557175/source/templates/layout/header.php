<div class="header transition">
	<div class="logo-banner transition">
		<div class="wrap-content">
			<div class="logo-head">
				<a href="">
					<div class="wrap-logo">
						<img class="transition" src="<?=THUMBS?>/180x55x2/<?=UPLOAD_PHOTO_L.$logo['photo']?>" alt="Logo"/>
					</div>
				</a>
			</div>
			<div class="full-menu">
				<div class="wrapmenu">
				    <?php
				        include TEMPLATE.LAYOUT."menu.php";
				    ?>
				    <div class="menu_mobi transition">
					    <div class="openMenu btnMenu" id="hamburger">
						      <span></span> 
						</div>
				    </div>
		            <div class="khung_search transition hidemb">
			            <a class="btn_search_display" href="javascript:void(0);">
			              <span class="lup">
			                <i class="fa fa-search"></i>
			              </span>
			              <span class="closese">
			                  <i class="far fa-times-circle"></i>
			                </span>
			            </a>
			            <div class="search">
			                <input type="text" id="keyword" placeholder="<?=nhaptukhoatimkiem?>" onkeypress="doEnter(event,'keyword');"/>
			                <p onclick="onSearch('keyword');"><i class="fas fa-search"></i></p>
			            </div>
			        </div>
				</div>
			</div>
		</div>
	</div>
</div>
