<!-- Header -->
<{include file='db:testimonial_admin_header.tpl' }>

<{if $testimonials_list|default:''}>
    <table class='table table-bordered'>
        <thead>
            <tr class='head'>
                <th class="center"><{$smarty.const._AM_TESTIMONIAL_TESTIMONIAL_ID}></th>
                <th class="center"><{$smarty.const._AM_TESTIMONIAL_TESTIMONIAL_TITLE}></th>
                <th class="center"><{$smarty.const._AM_TESTIMONIAL_TESTIMONIAL_DESCR}></th>
                <th class="center"><{$smarty.const._AM_TESTIMONIAL_TESTIMONIAL_IMG}></th>
                <th class="center"><{$smarty.const._AM_TESTIMONIAL_TESTIMONIAL_PROFESSION}></th>
                <th class="center"><{$smarty.const._AM_TESTIMONIAL_TESTIMONIAL_DATE}></th>
                <th class="center width5"><{$smarty.const._AM_TESTIMONIAL_FORM_ACTION}></th>
            </tr>
        </thead>
        <{if $testimonials_count|default:''}>
        <tbody>
            <{foreach item=testimonial from=$testimonials_list}>
            <tr class='<{cycle values='odd, even'}>'>
                <td class='center'><{$testimonial.id}></td>
                <td class='center'><{$testimonial.title}></td>
                <td class='center'><{$testimonial.descr_short}></td>
                <td class='center'><img src="<{$testimonial_upload_url|default:false}>/images/testimonials/<{$testimonial.img}>" alt="testimonials" style="max-width:100px" ></td>
                <td class='center'><{$testimonial.profession}></td>
                <td class='center'><{$testimonial.date}></td>
                <td class="center  width5">
                    <a href="testimonials.php?op=edit&amp;testi_id=<{$testimonial.id}>&amp;start=<{$start}>&amp;limit=<{$limit}>" title="<{$smarty.const._EDIT}>"><img src="<{xoModuleIcons16 edit.png}>" alt="<{$smarty.const._EDIT}> testimonials" ></a>
                    <a href="testimonials.php?op=clone&amp;testi_id_source=<{$testimonial.id}>" title="<{$smarty.const._CLONE}>"><img src="<{xoModuleIcons16 editcopy.png}>" alt="<{$smarty.const._CLONE}> testimonials" ></a>
                    <a href="testimonials.php?op=delete&amp;testi_id=<{$testimonial.id}>" title="<{$smarty.const._DELETE}>"><img src="<{xoModuleIcons16 delete.png}>" alt="<{$smarty.const._DELETE}> testimonials" ></a>
                </td>
            </tr>
            <{/foreach}>
        </tbody>
        <{/if}>
    </table>
    <div class="clear">&nbsp;</div>
    <{if $pagenav|default:''}>
        <div class="xo-pagenav floatright"><{$pagenav|default:false}></div>
        <div class="clear spacer"></div>
    <{/if}>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <div class="errorMsg"><strong><{$error|default:false}></strong></div>
<{/if}>

<!-- Footer -->
<{include file='db:testimonial_admin_footer.tpl' }>
