
(function ($) {
  // USE STRICT
  "use strict";


  $( "#loginForm" ).validate({ 
          rules: {
            username: {
              required: true
            },
            password: {
                required: true
            }
          },
          messages:{
                    username: {
                      required: "Please enter your Username."
                    },
                    password: {
                        required: "Please enter your password"
                    }
                }
        });

      $( "#signupForm" ).validate({ 
        rules: {
          name: {
            required: true
          },
          email: {
              required: true,
              email: true
          },
          username: {
              required: true
          },
          password: {
              required: true,
              minlength: 6
          },
          confirm_password: {
              required: true,
              equalTo: "#signupPassword"
          },
          country_id: {
              required: true
          }
        },
        messages:{
                  name: {
                    required: "Please enter your Name"
                  },
                  email: {
                      required: "Please enter your Email Address"
                  },
                  username: {
                      required: "Please enter your username"
                  },
                  password: {
                      required: "Please enter your password",
                      minlength: "Please enter atleast 6 character password"
                  },
                  confirm_password: {
                        required: "Please confirm your password",
                        equalTo: "Please enter confirm password same as password."
                  },
                  country_id: {
                      required: "Please enter your password"
                  }
              }
        });

      $( "#addJobForm" ).validate({ 
          rules: {
            title: {
              required: true
            },
            company_overview: {
                required: true
            },
            location: {
                required: true
            },
            salary: {
                required: true,
                digits: true
            },
            requirement: {
                required: true
            },
            summary: {
                required: true
            },                      
            description: {
                required: true
            }
          },
          messages:{
                    title: {
                        required: "Please Enter Job Title"
                      },
                      company_overview: {
                          required: "Please Enter Company Overview"
                      },
                      location: {
                          required: "Please Enter Job location"
                      },
                      salary: {
                          required: "Please Enter salary",
                          digits: "PLease Enter Salary in Numbers"
                      },
                      requirement: {
                          required: "Please Enter Job requirement"
                      },
                      summary: {
                          required: "Please Enter Job Summary"
                      },                      
                      description: {
                          required: "Please Enter Job Description"
                      }
                }
        });
        
        $( "#editJobForm" ).validate({ 
          rules: {
            title: {
              required: true
            },
            company_overview: {
                required: true
            },
            location: {
                required: true
            },
            salary: {
                required: true,
                digits: true
            },
            requirement: {
                required: true
            },
            summary: {
                required: true
            },                      
            description: {
                required: true
            }
          },
          messages:{
                    title: {
                      required: "Please Enter Job Title"
                    },
                    company_overview: {
                        required: "Please Enter Company Overview"
                    },
                    location: {
                        required: "Please Enter Job location"
                    },
                    salary: {
                        required: "Please Enter salary",
                        digits: "PLease Enter Salary in Numbers"
                    },
                    requirement: {
                        required: "Please Enter Job requirement"
                    },
                    summary: {
                        required: "Please Enter Job Summary"
                    },                      
                    description: {
                        required: "Please Enter Job Description"
                    }
                }
        });

      

        $( "#profileEducationForm" ).validate({ 
          rules: {
            'education_level_id[]': {
              required: true
            },
            'university[]': {
                required: true
            }
          },
          messages:{
              'education_level_id[]': {
                  required: "Please select highest education"
                },
              'university[]': {
                  required: "Please enter your university or education"
                }
                      
            }
        });

        $( "#profileExperienceForm" ).validate({ 
          rules: {
            'company_name[]': {
              required: true
            },
            'flight_experience[]': {
                required: true
            },
            'from_year[]': {
                required: true
            }            ,
            'to_year[]': {
                required: true
            },
            'designation[]': {
                required: true
            },
            'salary[]': {
                required: true
            }
          },
          messages:{
              'company_name[]': {
                  required: "Please enter company name"
                },
              'flight_experience[]': {
                  required: "Please select your flight experince"
                },
              'from_year[]': {
                  required: "Please select experience starting year"
                },
              'to_year[]': {
                  required: "Please select experience ending year"
                },
              'designation[]': {
                  required: "Please enter Designation"
                },
              'salary[]': {
                  required: "Please enter your salary in figures"
                }
                      
            }
        });

        $(document).on('change', '.to_year',function(){
          var toYear = parseInt($(this).val());
          var fromYear = parseInt($(this).parent('div').parent('div').parent('div').find('.from_year').val());
          console.log(toYear);
          console.log(fromYear);

          if(fromYear > toYear  || (fromYear === toYear)){
            //$(this).css
          }
          
          //console.log('to: '+toYear+' from: '+fromYear);
        });
        
        
        $(document).on('change', '#filterForm',function(){
          $("#filterForm").submit();
          
          //console.log('to: '+toYear+' from: '+fromYear);
        });


      //Preview profile image before upload
      function readURL(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          //console.log('dsk'+e.target.result);
          $('#dsk_img').attr('src', e.target.result).css("width", '255px').css("height", '255px');
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#dsk_profile").change(function() {
      //console.log(this);
      readURL(this);
    });

    function readURLMob(input) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();
        
        reader.onload = function(e) {
          console.log(e.target.result);
          $('#mob_img').attr('src', e.target.result);
        }
        
        reader.readAsDataURL(input.files[0]);
      }
    }

    $("#mob_profile").change(function() {
      readURLMob(this);
    });

    $('.checkJob').change(function() {
            var status = $(this).prop('checked');
            var id = $(this).attr('data-id');
            var target_url = "jobs/changeStatus";
            
            $.ajax({
                type: "POST",
                url: target_url,
                data: {"status": ((status === true) ? 1 : 0), "id": id},
                success: function(msg){
                  return false;
                    //window.location.reload();
                },
                error: function(er) {
                    console.log(er);
                }
            });
        });

    $('#plan_type').change(function() {
            var status = $(this).prop('checked');
            var id = ((status === true) ? 'yearly' : 'monthly');
            window.location = id;
            
        });

    $('#customCheck1').change(function() {
          var status = $(this).prop('checked');
          if(status === true){
            $(this).val('1');
          }else{
            $(this).val('0');
          }
      });

    //Clone Job Seeker highest education fields
    $(".add-education").click(function() {
      var remove = '<div class="row remove-edu"><button class="btn btn-danger">- Remove</button></div>';
      $(this).parent().before($(".highest-lavel-education:first").clone().append(remove))
    });

    //Clone Job Seeker Flight Experience fields
    $(".add-experience").click(function() {
      var remove = '<div class="row remove-exp"><button class="btn btn-danger">- Remove</button></div>';
      $(this).parent().before($(".highest-lavel-education:first").clone().append(remove))
    });

    $(document).on('click', '.view-article', function(){
      window.location = $(this).attr('data-href');
    });
    $(document).on('click', '.view-publication', function(){
      window.location = $(this).attr('data-href');
    });
    $(document).on('click', '.view-author', function(){
      window.location = $(this).attr('data-href');
    });
    
    setTimeout(function(){ 
      $(document).find('.notification-msg').hide(); 
    }, 5000);

})(jQuery);