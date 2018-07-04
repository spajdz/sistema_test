/* jshint bitwise:true, browser:true, eqeqeq:true, forin:true, globalstrict:true, indent:4, jquery:true,
   loopfunc:true, maxerr:3, noarg:true, node:true, noempty:true, onevar: true, quotmark:single,
   strict:true, undef:true, white:false */
/* global FB, webroot, fullwebroot */

/*!
 * Books & Bits | Backend
 */

//<![CDATA[
'use strict';

/**
 * jQuery
 */
jQuery(document).ready(function($)
{
	/* LOCK SCREEN */
    $('.lockscreen-box .lsb-access').on('click',function()
	{
		$(this).parent('.lockscreen-box').addClass('active').find('input').focus();
		return false;
	});

    $('.lockscreen-box .user_signin').on('click',function()
	{
		$('.sign-in').show();
		$(this).remove();
		$('.user').hide().find('img').attr('src', webroot + 'backend/assets/images/users/no-image.jpg');
		$('.user').show();
		return false;
	});
    /* END LOCK SCREEN */

	/**
	 * Ordenamiento de tablas generico
	 */
	if ( $('.js-generico-contenedor-sort').length )
	{
		$('.js-generico-contenedor-sort').sortable(
		{
			axis			: 'y',
			cursor			: 'move',
			helper			: function(e, tr)
			{
				var $originals	= tr.children(),
					$helper		= tr.clone();
	
				$helper.children().each(function(index)
				{
					$(this).width($originals.eq(index).width());
				});
				return $helper;
			},
			stop			: function(e, ui)
			{
				$('td.js-generico-orden', ui.item.parent()).each(function(i)
				{
					var $this		= $(this);
					$this.find('input').val(i + 1);
					$this.find('span').text(i + 1);
				});
	
				var $form		= ui.item.parents('form').first();
				$.post($form.attr('action'), $form.serialize());
			}
		}).disableSelection();
	
		$('.js-generico-handle-sort').on('click', function(evento)
		{
			evento.preventDefault();
		});
	}


	/**
	 * Editor de ayudas
	 */
	if ( $('.js-summernote').length )
	{
		$('.js-summernote').summernote(
		{
			height		: 300,
			focus		: true,
			toolbar		: [
				['style', ['bold', 'italic', 'underline', 'clear']],
				['insert', ['link', 'picture']]
			]
		});
	}


	/**
	 * Select estados
	 */
	if ( $('select.select').length )
	{
		$('select.select').selectpicker();
	}
	
	if ( $('input.icheckbox').length )
	{
		$('input.icheckbox').iCheck(
		{
			checkboxClass	: 'icheckbox_flat-red',
			radioClass		: 'iradio_flat-red',
			increaseArea	: '20%'
		});
	}
});
//]]>
