<{include file='db:testimonial_header.tpl' }>

<{if $testimonialsCount|default:0 > 0}>
<div class='table-responsive'>
    <table class='table table-<{$table_type|default:false}>'>
        <thead>
            <tr class='head'>
                <th colspan='<{$divideby|default:false}>'><{$smarty.const._MA_TESTIMONIAL_TESTIMONIALS_TITLE}></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <{foreach item=testimonial from=$testimonials name=testimonial}>
                <td>
                    <div class='panel panel-<{$panel_type|default:false}>'>
                        <{include file='db:testimonial_testimonials_item.tpl' }>
                    </div>
                </td>
                <{if $smarty.foreach.testimonial.iteration is div by $divideby}>
                    </tr><tr>
                <{/if}>
                <{/foreach}>
            </tr>
        </tbody>
        <tfoot><tr><td>&nbsp;</td></tr></tfoot>
    </table>
</div>
<{/if}>
<{if $form|default:''}>
    <{$form|default:false}>
<{/if}>
<{if $error|default:''}>
    <{$error|default:false}>
<{/if}>

<{include file='db:testimonial_footer.tpl' }>
