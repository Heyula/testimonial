<i id='testiId_<{$testimonial.testi_id}>'></i>
<div class='panel-heading'>
</div>
<div class='panel-body'>
</div>
<div class='panel-foot'>
    <div class='col-sm-12 right'>
        <{if $showItem|default:''}>
            <a class='btn btn-success right' href='testimonials.php?op=list&amp;start=<{$start}>&amp;limit=<{$limit}>#testiId_<{$testimonial.testi_id}>' title='<{$smarty.const._MA_TESTIMONIAL_TESTIMONIALS_LIST}>'><{$smarty.const._MA_TESTIMONIAL_TESTIMONIALS_LIST}></a>
        <{else}>
            <a class='btn btn-success right' href='testimonials.php?op=show&amp;testi_id=<{$testimonial.testi_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._MA_TESTIMONIAL_DETAILS}>'><{$smarty.const._MA_TESTIMONIAL_DETAILS}></a>
        <{/if}>
        <{if $permEdit|default:''}>
            <a class='btn btn-primary right' href='testimonials.php?op=edit&amp;testi_id=<{$testimonial.testi_id}>&amp;start=<{$start}>&amp;limit=<{$limit}>' title='<{$smarty.const._EDIT}>'><{$smarty.const._EDIT}></a>
            <a class='btn btn-primary right' href='testimonials.php?op=clone&amp;testi_id_source=<{$testimonial.testi_id}>' title='<{$smarty.const._CLONE}>'><{$smarty.const._CLONE}></a>
            <a class='btn btn-danger right' href='testimonials.php?op=delete&amp;testi_id=<{$testimonial.testi_id}>' title='<{$smarty.const._DELETE}>'><{$smarty.const._DELETE}></a>
        <{/if}>
    </div>
</div>
