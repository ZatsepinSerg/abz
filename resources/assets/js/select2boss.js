
    $(document).ready(function() {
        $('#list').on("click", ' tr', function () {
            var id = this.id;
            location.href = "/worker/" + id + "/edit";
        });


        $('.js-example-basic-single').select2({
            ajax :{
                url : '/ajax/short',
                dataType : 'json',
                delay : 200 ,
                data : function (params) {
                    return {
                        q : params.term,
                        page :params.page
                    };
                },
                processResults : function (data , params) {
                    params.page = params.page || 1;
                    return {
                        results : data.data,
                        pagination : {
                            more : (params.page *10) < data.total
                        }
                    };
                }
            },
            minimumInputLength : 1,
            templateResult : function (repo) {
                if(repo.loading){
                    return repo.name;
                }

                var markup = repo.name;

                return markup;
            },
            templateSelection : function(repo){
                return repo.name;
            },
            escapeMarkup : function (markup) {
                return markup;
            }
        });
    });
