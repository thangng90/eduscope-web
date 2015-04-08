$.number2Star = function (n) {
    var s = [], i = 5, t;
    n = Math.round(n * 2) / 2;
    while (i--) {
        t = n--;
        s.push(t > 0.5 ? '<i class="fa fa-star"></i>' : t > 0 ? '<i class="fa fa-star-half-o"></i>' : '<i class="fa fa-star-o"></i>');
    }
    return s.join(' ');
};

$(function () {
    var anchor,
    template = {
        album : {tag:"article","class":"col-sm-6 col-md-4 col-lg-3 photo-item",id:"album-${id}",children:[{tag:"div","class":"item-wrapper transit",children:[{tag:"a","class":"photo-link",href:"${url}",children:[{tag:"figure","class":"transit",children:[{tag:"img",src:"${thumbnail}",alt:"",html:""},{tag:"figcaption",html:function(){return this.description||"<i class='fa fa-link'></i>"}}]}]},{tag:"div","class":"photo-info",children:[{tag:"div","class":"author",children:[{tag:"a",href:function(){return this.author.url},html:function(){return'<img class="avatar" src="'+this.author.avatar+'"> '+this.author.name}},{tag:"time",html:"<i class='fa fa-calendar'></i> ${created_date}"}]},{tag:"div","class":"extras",children:[{tag:"h2","class":"album-name",html:"${name}"}]}]}]}]},
        photo : {"tag":"article","class":"col-sm-6 col-md-4 col-lg-3 photo-item","id":"${id}","children":[{"tag":"div","class":"item-wrapper","children":[{"tag":"a","class":"photo-link","href":"${url}","children":[{"tag":"figure","class":"transit","children":[{"tag":"img","src":"${thumbnail}","alt":"","html":""},{"tag":"figcaption","html":function(){return this.description||"<i class='fa fa-link'></i>"}}]}]},{"tag":"div","class":"album-info","children":[{"tag":"div","class":"photo-name","html":"${name}"},{"tag":"div","class":"extras","children":[{"tag":"div","class":"location","html":"<i class='fa fa-map-marker'></i> ${location}"},{"tag":"div","class":"rating","html":function(){return $.number2Star(this.rating.star)+(this.rating.count>0?(" <small>("+this.rating.count+")</small>"):"")}}]}]}]}]}
    },
    callAjax = {
        album : function(){
            if ($("[data-more]").length && ($(window).scrollTop() + $(window).height() >= anchor.offset().top)) {
                // console.log(anchor.data());
                $(window).off('scroll');
                 $.ajax({
                     dataType: "json",
                     url: "data/albums.json",
                     data: anchor.data(),
                     success: function (data) {
                         $.each(data.data, function (i, item) {
                             $(".album-grid").append(json2html.transform(item, template.album));
                         });
                         $(window).on('scroll', callAjax.album);
                         data.lastpage && $("[data-more]").remove();
                     },
                     error: function (request, status, error) {
                         console.log(request.responseText);
                     }
                 });
             }
        },
        photo : function(){
            if ($("[data-more]").length && ($(window).scrollTop() + $(window).height() >= anchor.offset().top)) {
                console.log(anchor.data());
                $(window).off('scroll');
                 $.ajax({
                     dataType: "json",
                     url: "data/photos.json",
                     data: anchor.data(),
                     success: function (data) {
                         $.each(data.data, function (i, item) {
                             $(".photo-grid").append(json2html.transform(item, template.photo));
                         });
                         $(window).on('scroll', callAjax.photo);
                         data.lastpage && $("[data-more]").remove();
                     },
                     error: function (request, status, error) {
                         console.log(request.responseText);
                     }
                 });
             }
        }
    };
    $(window).on('scroll', function(){
        (anchor = anchor || $("[data-more]")) && callAjax[ anchor.data('more') ](); 
    });
});
