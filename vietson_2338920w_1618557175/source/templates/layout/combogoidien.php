<div id="fix_phone">
	<a class="text-decoration-none" href="<?=$optsetting['fanpage']?>" target="_blank">
		<i class="fab fa-facebook-f"></i>
		<span>Facebook</span>
	</a>
	<a class="text-decoration-none" href="tel:<?=$optsetting['hotline']?>">
		<i class="fas fa-phone-alt"></i>
		<span>Gọi điện</span>
	</a>
	<a class="text-decoration-none" href="sms:<?=$optsetting['hotline']?>">
		<i class="far fa-comments"></i>
		<span>Gửi tin nhắn</span>
	</a>
	<a class="text-decoration-none zalobt"  target="_blank" href="https://zalo.me/<?=preg_replace('/[^0-9]/','',$optsetting['zalo']);?>">
		<img src="assets/images/i3.png" alt="Zalo">
		<span>Zalo</span>
	</a>
	<a class="text-decoration-none" href="lien-he">
		<i class="fas fa-file-signature"></i>
		<span>Liên hệ</span></a>
</div>

