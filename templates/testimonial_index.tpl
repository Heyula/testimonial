<{include file='db:testimonial_header.tpl' }>

<!-- Start index list -->
<table>
    <thead>
        <tr class='center'>
            <th><{$smarty.const._MA_TESTIMONIAL_TITLE}>  -  <{$smarty.const._MA_TESTIMONIAL_DESC}></th>
        </tr>
    </thead>
    <tbody>
        <tr class='center'>
            <td class='bold pad5'>
                <ul class='menu text-center'>
                    <li><a href='<{$testimonial_url}>'><{$smarty.const._MA_TESTIMONIAL_INDEX}></a></li>
                    <li><a href='<{$testimonial_url}>/testimonials.php'><{$smarty.const._MA_TESTIMONIAL_TESTIMONIALS}></a></li>
                </ul>
            </td>
        </tr>
    </tbody>
    <tfoot>
        <tr class='center'>
            <td class='bold pad5'>
                <{if $adv|default:''}><{$adv|default:false}><{/if}>
            </td>
        </tr>
    </tfoot>
</table>
<!-- End index list -->

<div class='testimonial-linetitle'><{$smarty.const._MA_TESTIMONIAL_INDEX_LATEST_LIST}></div>
<{if $testimonialsCount|default:0 > 0}>
    <!-- Start show new testimonials in index -->
    <table class='table table-<{$table_type}>'>
                    </tr><tr>
        <tr>
            <!-- Start new link loop -->
            <{foreach item=testimonial from=$testimonials name=testimonial}>
                <td class='col_width<{$numb_col}> top center'>
                    <{include file='db:testimonial_testimonials_list.tpl' testimonial=$testimonial}>
                </td>
                <{if $smarty.foreach.testimonial.iteration is div by $divideby}>
                    </tr><tr>
                <{/if}>
            <{/foreach}>
            <!-- End new link loop -->
        </tr>
    </table>
<{/if}>
<{include file='db:testimonial_footer.tpl' }>
