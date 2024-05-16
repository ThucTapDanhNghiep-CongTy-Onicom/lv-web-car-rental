/*
 *  I18n.js
 *  =======
 *
 *  Simple localization util.
 *  1. Store your localized labels in json format: `localized-content.json`
 *  2. Write your markup with key references using `data-i18n` attributes.
 *  3. Explicitly invoke a traverse key resolver: `i18n.localize()`
 *     OR
 *     Change the language, and the contents will be refreshed: `i18n.lang('en')`
 *
 *  This util relies on jQuery to work. I would recommend using the latest version
 *  available (1.12.x or 2.1.4+), although this will probably run with any older
 *  version since it is only taking advantage of `$.getJSON()` and the jQuery
 *  selector function `$()`.
 * 
 *  © 2016 Diogo Simões - diogosimoes.com
 *
 */
(function() {
    this.I18n = function(defaultLang) {
        var getlang = localStorage.getItem('language') || 'en'
        var lang = defaultLang || getlang; //Set language default
        this.language = lang;

        (function(i18n) {
            i18n.contents = demoJson;
            i18n.contents.prop = function(key) {
                var result = this;
                var keyArr = key.split('.');
                for (var index = 0; index < keyArr.length; index++) {
                    var prop = keyArr[index];
                    result = result[prop];
                }
                return result;
            };
            i18n.localize();
        })(this);
    };

    this.I18n.prototype.hasCachedContents = function() {
        return this.contents !== undefined;
    };

    this.I18n.prototype.lang = function(lang) {
        if (typeof lang === 'string') {
            this.language = lang;
        }
        this.localize();
        return this.language;
    };

    this.I18n.prototype.localize = function() {
        var contents = this.contents;
        if (!this.hasCachedContents()) {
            return;
        }
        var dfs = function(node, keys, results) {
            var isLeaf = function(node) {
                for (var prop in node) {
                    if (node.hasOwnProperty(prop)) {
                        if (typeof node[prop] === 'string') {
                            return true;
                        }
                    }
                }
            }
            for (var prop in node) {
                if (node.hasOwnProperty(prop) && typeof node[prop] === 'object') {
                    var myKey = keys.slice();
                    myKey.push(prop);
                    if (isLeaf(node[prop])) {
                        //results.push(myKey.reduce((prev, current) => prev + '.' + current));	//not supported in older mobile broweser
                        results.push(myKey.reduce(function(previousValue, currentValue, currentIndex, array) {
                            return previousValue + '.' + currentValue;
                        }));
                    } else {
                        dfs(node[prop], myKey, results);
                    }
                }
            }
            return results;
        };
        var keys = dfs(contents, [], []);
        for (var index = 0; index < keys.length; index++) {
            var key = keys[index];
            if (contents.prop(key).hasOwnProperty(this.language)) {
                $('[data-i18n="' + key + '"]').text(contents.prop(key)[this.language]);
                $('[data-i18n-placeholder="' + key + '"]').attr('placeholder', contents.prop(key)[this.language]);
                $('[data-i18n-value="' + key + '"]').attr('value', contents.prop(key)[this.language]);
            } else {
                $('[data-i18n="' + key + '"]').text(contents.prop(key)['en']);
                $('[data-i18n-placeholder="' + key + '"]').attr('placeholder', contents.prop(key)['en']);
                $('[data-i18n-value="' + key + '"]').attr('value', contents.prop(key)['en']);
            }
        }
    };

}).apply(window);

$(document).ready(function() {

    var i18n = new I18n();
    i18n.localize();
    $('.lang-picker #english').addClass('selected');

    $('.lang-picker #portuguese').on('click', function() {
        i18n.lang('pt');
        selectLang($(this));
        localStorage.setItem('language', 'pt');
    })
    $('.lang-picker #english').on('click', function() {
        i18n.lang('en');
        selectLang($(this));
        localStorage.setItem('language', 'en');
    })
    $('.lang-picker #vietnamese').on('click', function() {
        i18n.lang('vi');
        selectLang($(this));
        localStorage.setItem('language', 'vi');
    })

    function selectLang(picker) {
        $('.lang-picker li').removeClass('selected');
        picker.addClass('selected');
    }
});

/**
 * Content translate
 */


var demoJson = {
    "header": {
        "home": {
            "pt": "Zé dos Anzóis",
            "en": "Home",
            "vi": "Trang chủ"
        },
        "vehicle": {
            "pt": "Zé dos Anzóis",
            "en": "Vehicle",
            "vi": "Phương tiện"
        },
        "contact": {
            "pt": "Zé dos Anzóis",
            "en": "Contact",
            "vi": "Liên lạc"
        },
        "signIn": {
            "pt": "Zé dos Anzóis",
            "en": "Sign In",
            "vi": "Đăng nhập"
        },
        "signUp": {
            "pt": "Zé dos Anzóis",
            "en": "Sign Up",
            "vi": "Đăng ký"
        }
    },
    "home": {
        "booking": {
            "title": {
                "pt": "Zé dos Anzóis",
                "en": "Make your trip",
                "vi": "Thực hiện chuyến đi của bạn"
            },
            "pickLocation": {
                "pt": "Zé dos Anzóis",
                "en": "PICK-UP LOCATION",
                "vi": "CHỌN ĐỊA ĐIỂM"
            },
            "pickLocationPlaceholder": {
                "pt": "Zé dos Anzóis",
                "en": "City, Airport, Station, etc",
                "vi": "Thành phố, Sân bay, Nhà ga, v.v."
            },
            "pickDate": {
                "pt": "Zé dos Anzóis",
                "en": "PICK-UP DATE",
                "vi": "Ngày đặt"
            },
            "pickTime": {
                "pt": "Zé dos Anzóis",
                "en": "PICK-UP TIME",
                "vi": "Thời gian đặt"
            },
            "pickTimePlaceholder": {
                "pt": "Zé dos Anzóis",
                "en": "Time",
                "vi": "Thời gian"
            },
            "dropDate": {
                "pt": "Zé dos Anzóis",
                "en": "DROP-OFF DATE",
                "vi": "Ngày trả"
            },
            "dropTime": {
                "pt": "Zé dos Anzóis",
                "en": "DROP-OFF TIME",
                "vi": "Thời gian trả"
            },
            "dropTimePlaceholder": {
                "pt": "Zé dos Anzóis",
                "en": "Time",
                "vi": "Thời gian"
            },
            "buttonRent": {
                "pt": "Zé dos Anzóis",
                "en": "Rent A Car Now",
                "vi": "Thuê xe ngay"
            },
            "guide": {
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "Better Way to Rent Your Perfect Cars",
                    "vi": "Cách tốt hơn để thuê những chiếc xe hoàn hảo của bạn"
                },
                "choose": {
                    "pt": "Zé dos Anzóis",
                    "en": "Choose Your Pickup Location",
                    "vi": "Chọn địa điểm nhận xe"
                },
                "deal": {
                    "pt": "Zé dos Anzóis",
                    "en": "Select the Best Deal",
                    "vi": "Chọn giao dịch tốt nhất"
                },
                "rent": {
                    "pt": "Zé dos Anzóis",
                    "en": "Reserve Your Rental Car",
                    "vi": "Đặt trước xe thuê của bạn"
                },
            }
        },
        "content": {
            "feature": {
                "pt": "Zé dos Anzóis",
                "en": "Key Features",
                "vi": "Các chức năng chức"
            },
            "about": {
                "title": {
                    "pt": "Enviar",
                    "en": "Welcome to Yotrip",
                    "vi": "Chào mừng đến Yotrip"
                },
                "heading": {
                    "pt": "Enviar",
                    "en": "About us",
                    "vi": "Về chúng tôi"
                },
                "content": {
                    "one": {
                        "pt": "Enviar",
                        "en": "Yotrip is a 4-7 seat self-driving car rental application platform, following the sharing economy model.",
                        "vi": "Yotrip là nền tảng ứng dụng cho thuê xe tự lái 4-7 chỗ, theo mô hình kinh tế sẻ chia."
                    },
                    "two": {
                        "pt": "Enviar",
                        "en": "Yotrip relies on technology to provide a comprehensive solution to travel problems by connecting customers with self-driving car rental service providers.",
                        "vi": "Yotrip dựa trên nền tảng công nghệ để cung cấp giải pháp toàn diện cho vấn đề đi lại bằng cách kết nối khách hàng với các nhà cung cấp dịch vụ cho thuê xe tự lái."
                    },
                    "three": {
                        "pt": "Enviar",
                        "en": "Yotrip with the mission of simplifying the car rental process with many utilities through mobile applications, and at the same time building a civilized and dynamic sharing ecosystem.",
                        "vi": "Yotrip với sứ mệnh đơn giản hoá quá trình thuê xe với nhiều tiện ích thông qua ứng dụng di động, đồng thời xây dựng một hệ sinh thái chia sẻ văn minh, năng động."
                    },
                },
                "btnSearch": {
                    "pt": "Enviar",
                    "en": "Search Vehicle",
                    "vi": "Tìm kiếm phương tiện"
                }
            },
            "location": {
                "heading": {
                    "pt": "Zé dos Anzóis",
                    "en": "Booking",
                    "vi": "Đặt trước"
                },
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "Location",
                    "vi": "Các địa điểm"
                }
            },
            "partnerRegis": {
                "content": {
                    "pt": "Zé dos Anzóis",
                    "en": "Become our partner for a chance to earn extra monthly income.",
                    "vi": "Hãy trở thành đối tác của chúng tôi để có cơ hội kiếm thêm thu nhập."
                },
                "btnRegis": {
                    "pt": "Zé dos Anzóis",
                    "en": "Partner Registration",
                    "vi": "Đăng ký đối tác"
                }
            },
            "featureVehicle": {
                "heading": {
                    "pt": "Zé dos Anzóis",
                    "en": "WHAT WE OFFER",
                    "vi": "NHỮNG GÌ CHÚNG TÔI CUNG CẤP"
                },
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "Featured Vehicles",
                    "vi": "Xe nổi bật"
                },
                "self": {
                    "pt": "Zé dos Anzóis",
                    "en": "Self-driving car",
                    "vi": "Xe tự lái"
                },
                "carDriver": {
                    "pt": "Zé dos Anzóis",
                    "en": "Car with driver",
                    "vi": "Xe có tài xế"
                }
            },
            "newspaper": {
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "Newspapers talk about us",
                    "vi": "Báo chí nói về chúng tôi"
                }
            },
            "download": {
                "heading": {
                    "pt": "Zé dos Anzóis",
                    "en": "BOOKING",
                    "vi": "Đặt trước"
                },
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "YOTRIP NOW",
                    "vi": "YOTRIP NGAY"
                },
                "note": {
                    "pt": "Zé dos Anzóis",
                    "en": "For faster, easier booking and evclusive deals",
                    "vi": "Để đặt phòng nhanh hơn, dễ dàng hơn và giao dịch hấp dẫn"
                },
                "android": {
                    "pt": "Zé dos Anzóis",
                    "en": "GET IT ON THE",
                    "vi": "TẢI VỀ TRÊN"
                },
                "ios": {
                    "pt": "Zé dos Anzóis",
                    "en": "AVAILABLE ON THE",
                    "vi": "CÓ SẴN TRÊN"
                }
            },
            "partner": {
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "Our Partners/ Our Clients",
                    "vi": "Đối tác / Khách hàng của chúng tôi"
                }
            },
            "total": {
                "one": {
                    "top": {
                        "pt": "Zé dos Anzóis",
                        "en": "Year",
                        "vi": "Năm"
                    },
                    "bottom": {
                        "pt": "Zé dos Anzóis",
                        "en": "Experienced",
                        "vi": "Kinh nghiệm"
                    }
                },
                "two": {
                    "top": {
                        "pt": "Zé dos Anzóis",
                        "en": "Total",
                        "vi": "Toàn bộ"
                    },
                    "bottom": {
                        "pt": "Zé dos Anzóis",
                        "en": "Cars",
                        "vi": "Ôtô"
                    }
                },
                "three": {
                    "top": {
                        "pt": "Zé dos Anzóis",
                        "en": "Happy",
                        "vi": "Người"
                    },
                    "bottom": {
                        "pt": "Zé dos Anzóis",
                        "en": "Customers",
                        "vi": "Hài lòng"
                    }
                },
                "four": {
                    "top": {
                        "pt": "Zé dos Anzóis",
                        "en": "Total",
                        "vi": "Toàn bộ"
                    },
                    "bottom": {
                        "pt": "Zé dos Anzóis",
                        "en": "Branches",
                        "vi": "Chi nhánh"
                    }
                },
            }
        },
        "footer": {
            "left": {
                "note": {
                    "pt": "Zé dos Anzóis",
                    "en": "Yotrip is a pioneer startup in the development of online platforms for rent and shared vary kinds of vehicles in Vietnam.",
                    "vi": "Yotrip là startup tiên phong trong việc phát triển nền tảng trực tuyến cho thuê và chia sẻ các loại phương tiện tại Việt Nam."
                },
                "question": {
                    "pt": "Zé dos Anzóis",
                    "en": "Have a Questions?",
                    "vi": "Bạn có thắc mắc?"
                },
                "address": {
                    "pt": "Zé dos Anzóis",
                    "en": "9th Floor, Vien Dong Building, 14 Phan Ton, Da Kao Ward, District 1, Ho Chi Minh City",
                    "vi": "Tầng	9th, khu Vien Dong, 14 Phan Tôn, phường Da Kao, quận 1, thành phố Hồ Chí Minh"
                }
            },
            "center": {
                "info": {
                    "pt": "Zé dos Anzóis",
                    "en": "Information",
                    "vi": "Thông tin"
                },
                "about": {
                    "pt": "Zé dos Anzóis",
                    "en": "About",
                    "vi": "Về chúng tôi"
                },
                "service": {
                    "pt": "Zé dos Anzóis",
                    "en": "Services",
                    "vi": "Dịch vụ"
                },
                "term": {
                    "pt": "Zé dos Anzóis",
                    "en": "Term and Conditions",
                    "vi": "Điều khoản và điều kiện"
                },
                "best": {
                    "pt": "Zé dos Anzóis",
                    "en": "Best Price Guarantee",
                    "vi": "Đảm bảo giá tốt nhất"
                },
                "privacy": {
                    "pt": "Zé dos Anzóis",
                    "en": "Privacy & Cookies Policy",
                    "vi": "Chính sách bảo mật và Cookies"
                },
                "register": {
                    "pt": "Zé dos Anzóis",
                    "en": "Register",
                    "vi": "Đăng ký"
                },
                "faqRent": {
                    "pt": "Zé dos Anzóis",
                    "en": "FAQ for car rental customers",
                    "vi": "FAQ cho khách thuê xe"
                },
                "faqOwner": {
                    "pt": "Zé dos Anzóis",
                    "en": "FAQ for car owners",
                    "vi": "FAQ cho chủ xe"
                },
                "regisOwner": {
                    "pt": "Zé dos Anzóis",
                    "en": "Register car owner Yotrip",
                    "vi": "Đăng ký xe chính chủ Yotrip"
                },
                "regisAgent": {
                    "pt": "Zé dos Anzóis",
                    "en": "Register agent Yotrip",
                    "vi": "Đăng ký đại lý Yotrip"
                },
            },
            "right": {
                "policy": {
                    "pt": "Zé dos Anzóis",
                    "en": "Policies & Regulations",
                    "vi": "Chính sách & quy định"
                },
                "price": {
                    "pt": "Zé dos Anzóis",
                    "en": "Price policy",
                    "vi": "Chính sách giá cả"
                },
                "flight": {
                    "pt": "Zé dos Anzóis",
                    "en": "Flight cancellation policy",
                    "vi": "Chính sách chuyến xe đã thuê"
                },
                "paymentPolicy": {
                    "pt": "Zé dos Anzóis",
                    "en": "Payment policy",
                    "vi": "Chính sách thanh toán"
                },
                "delivery": {
                    "pt": "Zé dos Anzóis",
                    "en": "Delivery time policy",
                    "vi": "Chính sách thời gian giao xe"
                },
                "policyEnd": {
                    "pt": "Zé dos Anzóis",
                    "en": "Policy to end the trip early",
                    "vi": "Chính sách kết thúc chuyến đi sớm"
                },
                "tutorial": {
                    "pt": "Zé dos Anzóis",
                    "en": "Tutorial",
                    "vi": "Hướng dẫn"
                },
                "general": {
                    "pt": "Zé dos Anzóis",
                    "en": "General guidance",
                    "vi": "Hướng dẫn chung"
                },
                "booking": {
                    "pt": "Zé dos Anzóis",
                    "en": "Booking Instructions (Details)",
                    "vi": "Hướng dẫn đặt chỗ (Chi tiết)"
                },
                "ownerGuide": {
                    "pt": "Zé dos Anzóis",
                    "en": "Owner's Guide (Detailed)",
                    "vi": "Hướng dẫn của chủ sở hữu (Chi tiết)"
                },
                "paymentGuide": {
                    "pt": "Zé dos Anzóis",
                    "en": "Payment Guide",
                    "vi": "Hướng dẫn chi tiết"
                }
            }
        }
    },
    "car": {
        "day": {
            "pt": "Zé dos Anzóis",
            "en": "day",
            "vi": "ngày"
        },
        "trip": {
            "pt": "Zé dos Anzóis",
            "en": "trip",
            "vi": "chuyến"
        },
        "rental": {
            "pt": "Zé dos Anzóis",
            "en": "Rent Now",
            "vi": "Thuê ngay"
        },
        "detail": {
            "pt": "Zé dos Anzóis",
            "en": "Details",
            "vi": "Chi tiết"
        }
    },
    "vehicle": {
        "search": {
            "left": {
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "The car you need",
                    "vi": "Chiếc xe bạn cần"
                },
                "render": {
                    "pt": "Zé dos Anzóis",
                    "en": "Renders",
                    "vi": "Hãng xe"
                },
                "seat": {
                    "pt": "Zé dos Anzóis",
                    "en": "Seat",
                    "vi": "Số chỗ ngồi"
                },
                "location": {
                    "pt": "Zé dos Anzóis",
                    "en": "Locations",
                    "vi": "Địa điểm"
                },
                "price": {
                    "pt": "Zé dos Anzóis",
                    "en": "price",
                    "vi": "Giá"
                },
                "btnSearch": {
                    "pt": "Zé dos Anzóis",
                    "en": "Find A Car Now",
                    "vi": "Tìm một chiếc xe ngay"
                }
            },
            "right": {
                "title": {
                    "pt": "Zé dos Anzóis",
                    "en": "Better Way to Rent Your Perfect Cars",
                    "vi": "Cách để thuê những chiếc xe hoàn hảo của bạn"
                }
            }
        },

    },
    "breakscrum": {
        "home": {
            "pt": "Zé dos Anzóis",
            "en": "Home",
            "vi": "Trang chủ"
        },
        "seeHere": {
            "pt": "Zé dos Anzóis",
            "en": "See here",
            "vi": "Xem ở đây"
        },
        "contact": {
            "pt": "Zé dos Anzóis",
            "en": "Contact",
            "vi": "Liên hệ"
        },
        "term": {
            "pt": "Zé dos Anzóis",
            "en": "Term And Conditions",
            "vi": "Điều khoản và Điều kiện"
        },
        "bestPrice": {
            "pt": "Zé dos Anzóis",
            "en": "Best Price Guarantee",
            "vi": "Đảm bảo giá tốt nhất"
        },
        "personal": {
            "pt": "Zé dos Anzóis",
            "en": "Personal information privacy policy",
            "vi": "Chính sách bảo mật thông tin cá nhân"
        },
        "faqUser": {
            "pt": "FAQ for car rental customers",
            "en": "FAQ for car rental customers",
            "vi": "FAQ thường gặp cho khách thuê xe"
        },
        "faqOwner": {
            "pt": "FAQ for car owners",
            "en": "FAQ for car owners",
            "vi": "FAQ thường gặp cho chủ xe"
        },
    },
    "contact": {
        "heading": {
            "pt": "Zé dos Anzóis",
            "en": "Contact Us",
            "vi": "Liên hệ với chúng tôi"
        },
        "form": {
            "name": {
                "pt": "Zé dos Anzóis",
                "en": "Your name",
                "vi": "Tên của bạn"
            },
            "email": {
                "pt": "Email",
                "en": "Email",
                "vi": "Email"
            },
            "message": {
                "pt": "Zé dos Anzóis",
                "en": "Message",
                "vi": "Tin nhắn"
            },
            "btnSubmit": {
                "pt": "Zé dos Anzóis",
                "en": "Send Message",
                "vi": "Gửi tin nhắn"
            }
        }
    },
    "basic": {
        "address": {
            "pt": "Email",
            "en": "Address",
            "vi": "Địa chỉ"
        },
        "phone": {
            "pt": "Email",
            "en": "Phone",
            "vi": "Điện thoại"
        },
        "features": {
            "pt": "Email",
            "en": "Features",
            "vi": "Đặc trưng"
        },
        "description": {
            "pt": "Email",
            "en": "Description",
            "vi": "Miêu tả"
        },
        "review": {
            "pt": "Email",
            "en": "Review",
            "vi": "Giới thiệu"
        },
        "chooseCar": {
            "pt": "Email",
            "en": "Choose car",
            "vi": "Chọn xe"
        },
        "related": {
            "pt": "Email",
            "en": "Related Cars",
            "vi": "Xe liên quan"
        },
        "first": {
            "pt": "Email",
            "en": "First name",
            "vi": "Họ"
        },
        "last": {
            "pt": "Email",
            "en": "Last name",
            "vi": "Tên"
        },
        "phoneNum": {
            "pt": "Email",
            "en": "Phone number",
            "vi": "Số điện thoại"
        },
        "emailAddress": {
            "pt": "Email",
            "en": "Email address",
            "vi": "Địa chỉ email"
        },
        "birth": {
            "pt": "Date",
            "en": "Date of birth",
            "vi": "Ngày sinh"
        },
        "pass": {
            "pt": "Password",
            "en": "Password",
            "vi": "Mật khẩu"
        },
        "day": {
            "pt": "Day",
            "en": "day",
            "vi": "ngày"
        },
        "total": {
            "pt": "Total",
            "en": "Total",
            "vi": "tổng"
        },
        "step": {
            "pt": "Step",
            "en": "Step",
            "vi": "Bước"
        },
    },
    "cars": {
        "option": {
            "mileage": {
                "pt": "Email",
                "en": "Mileage",
                "vi": "Đã đi"
            },
            "seat": {
                "top": {
                    "pt": "Email",
                    "en": "Seats",
                    "vi": "Chỗ ngồi"
                },
                "bottom": {
                    "pt": "Email",
                    "en": "Adults",
                    "vi": "Ghế"
                },
            },
            "luggage": {
                "top": {
                    "pt": "Email",
                    "en": "Luggage",
                    "vi": "Hành lý"
                },
                "bottom": {
                    "pt": "Email",
                    "en": "Bags",
                    "vi": "Túi"
                },
            },
            "fuel": {
                "pt": "Email",
                "en": "Fuel",
                "vi": "Nhiên liệu"
            },
            "transmission": {
                "top": {
                    "pt": "Email",
                    "en": "Transmission",
                    "vi": "Chuyển đổi"
                },
                "bottom": {
                    "pt": "Email",
                    "en": "Automatical",
                    "vi": "Tự động"
                },
                "manual": {
                    "pt": "Email",
                    "en": "Manual",
                    "vi": "Thủ công"
                }
            }
        },
        "rent": {
            "left": {
                "price": {
                    "pt": "Email",
                    "en": "Rental price list",
                    "vi": "Bảng giá cho thuê"
                },
                "month": {
                    "pt": "Email",
                    "en": "Rent by month",
                    "vi": "Thuê theo tháng"
                }
            },
            "center": {
                "cost": {
                    "pt": "Email",
                    "en": "Rent cost",
                    "vi": "Chi phí thuê"
                }
            },
            "right": {
                "time": {
                    "pt": "Email",
                    "en": "Time you want to rent the car",
                    "vi": "Thời gian bạn muốn thuê xe"
                },
                "date": {
                    "pt": "Email",
                    "en": "Date",
                    "vi": "Ngày đặt"
                },
                "back": {
                    "pt": "Email",
                    "en": "Back",
                    "vi": "Ngày trả"
                },
                "note1": {
                    "pt": "Email",
                    "en": "Estimated cost for 1 day",
                    "vi": "Chi phí ước tính cho 1 ngày"
                },
                "note2": {
                    "pt": "Email",
                    "en": "Estimated cost",
                    "vi": "Chi phí ước tính"
                },
                "btnRent": {
                    "pt": "Email",
                    "en": "Rent It Now",
                    "vi": "Thuê Xe Ngay"
                }
            }
        },
        "info": {
            "feature": {
                "title": {
                    "pt": "Email",
                    "en": "Features",
                    "vi": "Đặc trưng"
                },
                "aircon": {
                    "pt": "Email",
                    "en": "Airconditions",
                    "vi": "Điều hòa"
                },
                "child": {
                    "pt": "Email",
                    "en": "Child Seat",
                    "vi": "Ghế trẻ em"
                },
                "luggage": {
                    "pt": "Email",
                    "en": "Luggage",
                    "vi": "Hành lý"
                },
                "music": {
                    "pt": "Email",
                    "en": "Music",
                    "vi": "Âm nhạc"
                },
                "belt": {
                    "pt": "Email",
                    "en": "Seat Belt",
                    "vi": "Dây an toàn"
                },
                "sleep": {
                    "pt": "Email",
                    "en": "Sleeping Bed",
                    "vi": "Giường ngủ"
                },
                "water": {
                    "pt": "Email",
                    "en": "Water",
                    "vi": "Nước uống"
                },
                "onboard": {
                    "pt": "Email",
                    "en": "Onboard computer",
                    "vi": "Máy tính"
                },
                "audio": {
                    "pt": "Email",
                    "en": "Audio input",
                    "vi": "Đầu vào âm thanh"
                },
                "trip": {
                    "pt": "Email",
                    "en": "Long Term Trips",
                    "vi": "Các chuyến đi dài hạn"
                },
                "kit": {
                    "pt": "Email",
                    "en": "Car Kit",
                    "vi": "Phụ kiện xe hơi"
                },
                "central": {
                    "pt": "Email",
                    "en": "Remote central locking",
                    "vi": "Khóa trung tâm từ xa"
                },
                "control": {
                    "pt": "Email",
                    "en": "Climate control",
                    "vi": "Kiểm soát khí hậu"
                },
            },
            "description": {
                "note": {
                    "pt": "Email",
                    "en": "Mileage",
                    "vi": "Đã đi"
                },
                "title": {
                    "pt": "Email",
                    "en": "Description",
                    "vi": "Miêu tả"
                }
            },
            "review": {
                "heading": {
                    "pt": "Email",
                    "en": "Give a Review",
                    "vi": "Đưa ra đánh giá"
                },
                "title": {
                    "pt": "Email",
                    "en": "Review",
                    "vi": "Đánh giá"
                }
            }
        },
    },
    "regisPartner": {
        "basic": {
            "title": {
                "pt": "Email",
                "en": "Become a Driver Partner and deliver vehicles",
                "vi": "Trở thành đối tác tài xế và phương tiện"
            },
            "descript": {
                "pt": "Email",
                "en": "For more than 4 000 companies in Europe",
                "vi": "Đối với hơn 4000 công ty ở châu Âu"
            },
            "item1": {
                "pt": "Email",
                "en": "Quick and easy additional income",
                "vi": "Thu nhập bổ sung nhanh chóng và dễ dàng"
            },
            "item2": {
                "pt": "Email",
                "en": "Flexible hours",
                "vi": "Thời gian linh hoạt"
            },
            "item3": {
                "pt": "Email",
                "en": "Prestigious clients",
                "vi": "Khách hàng uy tín"
            },
            "heading": {
                "pt": "",
                "en": "Join a community with more than 15,000 driver partners",
                "vi": "Tham gia cộng đồng với hơn 15.000 đối tác tài xế"
            },
            "sub1": {
                "pt": "Email",
                "en": "To start your registration, nothing could be simpler",
                "vi": "Để bắt đầu đăng ký, không gì có thể đơn giản hơn"
            },
            "sub2": {
                "pt": "Email",
                "en": "Just a simple form !",
                "vi": "Chỉ là một hình thức đơn giản!"
            },
        },
        "full": {
            "banner": {
                "pt": "Email",
                "en": "Become a driver partner",
                "vi": "Trở thành đối tác tài xế"
            },
            "subBanner": {
                "pt": "Email",
                "en": "Complete the form",
                "vi": "Hoàn thành biểu mẫu"
            },
            "content": {
                "info": {
                    "title": {
                        "pt": "Information",
                        "en": "Information",
                        "vi": "Thông tin cá nhân"
                    },
                    "gender": {
                        "pt": "Email",
                        "en": "Gender",
                        "vi": "Giới tính"
                    },
                    "male": {
                        "pt": "Male",
                        "en": "Male",
                        "vi": "Nam"
                    },
                    "female": {
                        "pt": "Female",
                        "en": "Female",
                        "vi": "Nữ"
                    },
                    "other": {
                        "pt": "Other",
                        "en": "Other",
                        "vi": "Khác"
                    },
                    "yFirst": {
                        "pt": "Email",
                        "en": "Your first name",
                        "vi": "Họ của bạn"
                    },
                    "yLast": {
                        "pt": "Email",
                        "en": "Your lats name",
                        "vi": "Tên của bạn"
                    },
                    "yPhone": {
                        "pt": "Email",
                        "en": "Your phone number",
                        "vi": "Số điện thoại của bạn"
                    },
                    "yEmail": {
                        "pt": "Email",
                        "en": "Your e-mail address",
                        "vi": "Địa chỉ e-mail của bạn"
                    },
                    "yPass": {
                        "pt": "Email",
                        "en": "Your password",
                        "vi": "Mật khẩu của bạn"
                    },
                },
                "mail": {
                    "title": {
                        "pt": "Mailing address",
                        "en": "Mailing address",
                        "vi": "Địa chỉ Mail"
                    },
                    "city": {
                        "pt": "city",
                        "en": "City",
                        "vi": "Thành phố"
                    },
                    "town": {
                        "pt": "town",
                        "en": "Your town",
                        "vi": "Thành phố của bạn"
                    },
                    "post": {
                        "pt": "town",
                        "en": "Your postcode",
                        "vi": "Postcode của bạn"
                    },
                    "address": {
                        "pt": "town",
                        "en": "Address",
                        "vi": "Địa chỉ"
                    },
                    "yAddress": {
                        "pt": "town",
                        "en": "Your address",
                        "vi": "Địa chỉ của bạn"
                    },
                },
                "truck": {
                    "title": {
                        "pt": "Truck transports",
                        "en": "Truck transports",
                        "vi": "Xe tải vận chuyển"
                    },
                    "question": {
                        "pt": "Do you have a 1-car transporter?",
                        "en": "Do you have a 1-car transporter?",
                        "vi": "Bạn có cần 1 người vận chuyển xe không?"
                    },
                    "note": {
                        "pt": "Mailing address",
                        "en": "In addition to driving vehicles, you will be able to use your 1-car transporter to transport vehicles that can't be driven",
                        "vi": "Ngoài việc điều khiển phương tiện, bạn có thể sử dụng 1 xe vận tải của mình để vận chuyển những phương tiện không thể điều khiển được"
                    }
                },
                "company": {
                    "title": {
                        "pt": "Company",
                        "en": "Company",
                        "vi": "Công ty"
                    },
                    "note": {
                        "pt": "Company",
                        "en": "You can still apply to become a driver with us even if you're not yet self-employed",
                        "vi": "Bạn vẫn có thể đăng ký trở thành tài xế với chúng tôi ngay cả khi bạn chưa tự kinh doanh"
                    },
                    "status": {
                        "pt": "Company",
                        "en": "TYPE OF STATUS",
                        "vi": "LOẠI TRẠNG THÁI"
                    },
                    "op1": {
                        "pt": "Choose your situation",
                        "en": "Choose your situation",
                        "vi": "Chọn tình huống của bạn"
                    },
                    "op2": {
                        "pt": "Company",
                        "en": "Not self-employed yet",
                        "vi": "Chưa tự kinh doanh"
                    },
                    "op3": {
                        "pt": "Company",
                        "en": "Self-employed (includes non VAT registered company)",
                        "vi": "Tự kinh doanh (bao gồm cả công ty đã đăng ký không VAT)"
                    },
                },
                "accept": {
                    "note": {
                        "pt": "Information",
                        "en": "Yotrip reserves the right to decline any application where the information submitted is incomplete",
                        "vi": "Yotrip có quyền từ chối bất kỳ đơn đăng ký nào mà thông tin được gửi không đầy đủ"
                    },
                    "condition1": {
                        "pt": "Information",
                        "en": " I accept the",
                        "vi": "Tôi chấp nhận"
                    },
                    "condition2": {
                        "pt": "Information",
                        "en": "Terms and Conditions of use",
                        "vi": "Điều khoản và Điều kiện sử dụng"
                    },
                    "btnSubmit": {
                        "pt": "Information",
                        "en": "Submit my application",
                        "vi": "Gửi đơn đăng ký của tôi"
                    },
                }
            }
        }
    },
    "chooseTime": {
        "taxes": {
            "pt": "TAXES",
            "en": "TAXES",
            "vi": "THUẾ"
        },
        "detail": {
            "pt": "Detail price",
            "en": "Detail price",
            "vi": "Giá chi tiết"
        },
        "rentalPrice": {
            "pt": "Rental price",
            "en": "Rental price",
            "vi": "Giá cho thuê"
        },
        "service": {
            "pt": "",
            "en": "Service charge",
            "vi": "Phí dịch vụ"
        },
        "fees": {
            "pt": "",
            "en": "Insurance fees",
            "vi": "Phí bảo hiểm"
        },
        "total": {
            "pt": "",
            "en": "Total",
            "vi": "Tổng"
        },
        "btnRent": {
            "pt": "",
            "en": "Rent A Car Now",
            "vi": "Thuê xe ngay"
        }
    },
    "payment": {
        "left": {
            "gas": {
                "pt": "Gasoline",
                "en": "Gasoline",
                "vi": "Xăng"
            },
            "luggage": {
                "pt": "Luggage",
                "en": "Luggage",
                "vi": "Hành lý"
            },
            "owner": {
                "pt": "Car Owner",
                "en": "Car Owner",
                "vi": "Chủ xe"
            },
            "phone": {
                "pt": "Phone",
                "en": "Phone",
                "vi": "Điện thoại"
            },
            "pick": {
                "pt": "Pick-up",
                "en": "Pick-up",
                "vi": "Ngày đặt"
            },
            "payment": {
                "pt": "Payment Details",
                "en": "Payment Details",
                "vi": "Chi tiết thanh toán"
            },
            "counpon": {
                "pt": "Counpon",
                "en": "Counpon",
                "vi": "Phiếu mua hàng"
            }
        },
        "right": {
            "title": {
                "pt": "Contact Information",
                "en": "Contact Information",
                "vi": "Thông tin liên lạc"
            },
            "pay": {
                "pt": "Pay Now",
                "en": "Pay Now",
                "vi": "Thanh toán ngay"
            },
            "form1": {
                "title": {
                    "pt": "Select your payment method",
                    "en": "Select your payment method",
                    "vi": "Chọn phương thức thanh toán"
                },
                "title2": {
                    "pt": "(Click one option below)",
                    "en": "(Click one option below)",
                    "vi": "(Nhấp vào một tùy chọn bên dưới)"
                },
                "card": {
                    "note": {
                        "pt": "Important: Please fill out your credit/debit card details below to pay for your booking in a simple and secure way.",
                        "en": "Important: Please fill out your credit/debit card details below to pay for your booking in a simple and secure way.",
                        "vi": "Quan trọng: Vui lòng điền vào chi tiết thẻ tín dụng / thẻ ghi nợ của bạn bên dưới để thanh toán cho chuyến xe của bạn một cách đơn giản và an toàn."
                    },
                    "number": {
                        "pt": "CARD NUMBER",
                        "en": "CARD NUMBER",
                        "vi": "SỐ THẺ"
                    },
                    "name": {
                        "pt": "NAME OF CARD",
                        "en": "NAME OF CARD",
                        "vi": "TÊN CHỦ THẺ"
                    },
                    "expiration": {
                        "pt": "EXPIRATION",
                        "en": "EXPIRATION",
                        "vi": "HẾT HẠN"
                    },
                },
                "momo": {
                    "note": {
                        "pt": "You will be redirected to Momo to complete your purchase",
                        "en": "You will be redirected to Momo to complete your purchase",
                        "vi": "Bạn sẽ được chuyển hướng đến Momo để hoàn tất giao dịch mua của mình"
                    },
                },
                "bank": {
                    "note1": {
                        "pt": "Guarantee 100% safety when paying by bank transfer. Please enter your information and transfer to the account below. We will contact you as soon as possible to confirm and activate your account.",
                        "en": "Guarantee 100% safety when paying by bank transfer. Please enter your information and transfer to the account below. We will contact you as soon as possible to confirm and activate your account.",
                        "vi": "Đảm bảo an toàn 100% khi thanh toán chuyển khoản. Vui lòng nhập thông tin của bạn và chuyển vào tài khoản bên dưới. Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất có thể để xác nhận và kích hoạt tài khoản của bạn."
                    },
                    "note2": {
                        "pt": "Account Name: Vietnam Masters Co., Ltd",
                        "en": "Account Name: Vietnam Masters Co., Ltd",
                        "vi": "Tên tài khoản: Vietnam Masters Co., Ltd"
                    },
                    "note3": {
                        "pt": "Bank: VP Bank Ben Thanh branch",
                        "en": "Bank: VP Bank Ben Thanh branch",
                        "vi": "Ngân hàng: VP Bank chi nhánh Bến Thành"
                    },
                    "note4": {
                        "pt": "Account number: 220546039",
                        "en": "Account number: 220546039",
                        "vi": "Số tài khoản: 220546039"
                    },
                    "note5": {
                        "pt": "Transfer syntax: Name + Email (if any) + Phone number",
                        "en": "Transfer syntax: Name + Email (if any) + Phone number",
                        "vi": "Cú pháp chuyển khoản: Tên + Email (nếu có) + Số điện thoại"
                    },
                },
                "crypto": {
                    "inputPla": {
                        "pt": "Enter Token/Coin name",
                        "en": "Enter Token/Coin name",
                        "vi": "Nhập tên Token / Coin"
                    }
                }
            },
            "form2": {
                "title": {
                    "pt": "Reservation Terms and Booking Conditions",
                    "en": "Reservation Terms and Booking Conditions",
                    "vi": "Điều khoản Đặt chỗ và Điều kiện Đặt chỗ"
                },
                "note": {
                    "pt": "By completing this booking, you agree to the Booking Conditions, Terms and Conditions, and Privacy Policy.",
                    "en": "By completing this booking, you agree to the Booking Conditions, Terms and Conditions, and Privacy Policy.",
                    "vi": "Bằng cách hoàn tất việc đặt chỗ này, bạn đồng ý với các Điều kiện Đặt chỗ, Điều khoản và Điều kiện, và Chính sách Quyền riêng tư."
                }
            },
        }
    },
    "testimonial": {
        "title": {
            "pt": "TESTIMONIAL",
            "en": "TESTIMONIAL",
            "vi": "CHỨNG NHẬN"
        },
        "heading": {
            "pt": "Happy Clients",
            "en": "Happy Clients",
            "vi": "Khách hàng hài lòng"
        },
        "people": {
            "cmt": {
                "pt": "Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.",
                "en": "Far far away, behind the word mountains, far from the countries Vokalia zand Consonantia, there live the blind texts.",
                "vi": "Xa xa, đằng sau những ngọn núi chữ, xa những quốc gia Vokalia và Consonantia, có những văn tự mù mịt."
            },
            "position": {
                "pt": "Marketing Manager",
                "en": "Marketing Manager",
                "vi": "Giám đốc tiếp thị"
            },
        },
        "title": {
            "pt": "TAXES",
            "en": "TAXES",
            "vi": "THUẾ"
        },
    },
    "condition": {
        "form": {
            "title": {
                "pt": "Zé dos Anzóis",
                "en": "RESPONSIBILITIES OF CAR HIRES AND CAR OWNERS IN SELF-DRIVING CAR RENTAL TRANSACTIONS",
                "vi": "TRÁCH NHIỆM CỦA CHỦ XE VÀ CHỦ XE TRONG GIAO DỊCH THUÊ XE TỰ LÁI"
            },
            "des1": {
                "pt": "Zé dos Anzóis",
                "en": "Yotrip's long-term aim is to build a civilized and prestigious car-sharing community in Vietnam.",
                "vi": "Mục tiêu dài hạn của Yotrip là xây dựng một cộng đồng chia sẻ xe văn minh và uy tín tại Việt Nam."
            },
            "des2": {
                "pt": "Therefore, in order to ensure that car hire transactions in the community are conducted smoothly and successfully, it is important to regulate the responsibilities of the parties in compliance with Yotrip's policies and the terms of commitment.",
                "en": "Therefore, in order to ensure that car hire transactions in the community are conducted smoothly and successfully, it is important to regulate the responsibilities of the parties in compliance with Yotrip's policies and the terms of commitment.",
                "vi": "Vì vậy, để đảm bảo các giao dịch thuê xe trong cộng đồng được diễn ra thuận lợi và thành công, điều quan trọng là phải quy định trách nhiệm của các bên tuân thủ chính sách của Yotrip và các điều khoản cam kết."
            },
            "btn": {
                "pt": "Zé dos Anzóis",
                "en": "Search Vehicle",
                "vi": "Tìm phương tiện"
            }
        },
        "content": {
            "hRepon": {
                "pt": "THE RESPONSIBILITY OF THE CAR OWNER",
                "en": "THE RESPONSIBILITY OF THE CAR OWNER",
                "vi": "TRÁCH NHIỆM CỦA CHỦ XE"
            },
            "hHire": {
                "pt": "CAR HIRE RESPONSIBILITIES",
                "en": "CAR HIRE RESPONSIBILITIES",
                "vi": "TRÁCH NHIỆM CỦA NGƯỜI DÙNG XE"
            },
            "hRecomment": {
                "pt": "YOTRIP'S RESPONSIBILITIES AND RECOMMENDATIONS",
                "en": "YOTRIP'S RESPONSIBILITIES AND RECOMMENDATIONS",
                "vi": "TRÁCH NHIỆM VÀ KIẾN NGHỊ CỦA YOTRIP"
            },
            "h1n1": {
                "pt": "Zé dos Anzóis",
                "en": "Deliver the car and all documents related to the vehicle on time and in a safe and clean state to ensure the quality of service.",
                "vi": "Giao xe và tất cả các giấy tờ liên quan đến xe đúng thời hạn và trong tình trạng an toàn, sạch sẽ để đảm bảo chất lượng dịch vụ."
            },
            "h1n2": {
                "pt": "Zé dos Anzóis",
                "en": "The relevant vehicle documents include: vehicle registration paper (notarized photocopy), inspection paper, vehicle insurance paper (notarized or original photocopy).",
                "vi": "Các giấy tờ xe liên quan bao gồm: giấy đăng ký xe (bản photo công chứng), giấy kiểm định, giấy bảo hiểm xe (bản photo công chứng hoặc bản chính)."
            },
            "h1n3": {
                "pt": "Zé dos Anzóis",
                "en": "Legal responsibility for the origin and ownership of the vehicle.",
                "vi": "Chịu trách nhiệm pháp lý về nguồn gốc và quyền sở hữu của xe."
            },
            "h2n1": {
                "pt": "Zé dos Anzóis",
                "en": "Check the car thoroughly before receiving and before returning the car. Sign a written record of handover of the vehicle status upon receipt and when returning.",
                "vi": "Kiểm tra xe kỹ lưỡng trước khi nhận và trước khi trả xe. Ký biên bản bàn giao hiện trạng xe khi nhận và khi trả."
            },
            "h2n2": {
                "pt": "Zé dos Anzóis",
                "en": "Pay the car rental in full to the car owner when receiving the car.",
                "vi": "Thanh toán đầy đủ tiền thuê xe cho chủ xe khi nhận xe."
            },
            "h2n3": {
                "pt": "Zé dos Anzóis",
                "en": "Present all relevant documents to the vehicle owner: ID card, GPLX, Household Registration or KT3. Household registration/KT3 deposit, cash (VND 15 million or depending on the agreement with the vehicle owner) or equivalent assets (motorcycles and car parrots) before receiving the car.",
                "vi": "Xuất trình đầy đủ các giấy tờ liên quan cho chủ xe: CMND, GPLX, Hộ khẩu hoặc KT3. Hộ khẩu / KT3 đặt cọc, tiền mặt (15 triệu đồng hoặc tùy theo thỏa thuận với chủ xe) hoặc tài sản tương đương (xe máy, cà vẹt xe) trước khi nhận xe."
            },
            "h2n4": {
                "pt": "Zé dos Anzóis",
                "en": "Comply with the regulations and the time of return as agreed upon by the two parties.",
                "vi": "Tuân thủ các quy định và thời gian đổi trả theo thỏa thuận của hai bên."
            },
            "h2n5": {
                "pt": "Zé dos Anzóis",
                "en": "Responsible for compensating for any losses in parts and accessories of the car, 100% compensation according to the genuine parts price if the part is found to be swapped, 100% of the cost of repairing the car if there is a damage depending on the extent of damage of the car, the cost of the car holidays cannot run due to the fault of the car tenant (the price is calculated by the rent in the car. contract) and vehicle cleaning charges if any",
                "vi": "Chịu trách nhiệm bồi thường mọi tổn thất về linh kiện, phụ tùng của xe, đền bù 100% theo giá phụ tùng chính hãng nếu phát hiện bị tráo linh kiện, 100% chi phí sửa xe nếu hư hỏng tùy theo mức độ. hư hỏng xe, chi phí ngày lễ xe không chạy được do lỗi của người thuê xe (giá tính theo giá thuê xe. Trong hợp đồng) và phí vệ sinh xe nếu có."
            },
            "h3n1": {
                "pt": "Zé dos Anzóis",
                "en": "Yotrip recommends that car owners and car tenants should make written conclusions 'Self-driving car rental contracts' as well as sign 'Vehicle handover minutes' to ensure the rights of both parties in case of disputes.",
                "vi": "Yotrip khuyến cáo chủ xe và người thuê xe nên có văn bản kết luận “Hợp đồng thuê xe tự lái” cũng như ký “Biên bản bàn giao xe” để đảm bảo quyền lợi của đôi bên trong trường hợp có tranh chấp."
            },
            "h3n2": {
                "pt": "Zé dos Anzóis",
                "en": "Car owners can refer to yotrip's 'Self-driving car lease contract' and 'Car Handover Record' (please provide an email to Yotrip's customer service department to receive information).",
                "vi": "Các chủ xe có thể tham khảo 'Hợp đồng thuê xe tự lái' và 'Biên bản bàn giao xe' của yotrip (vui lòng cung cấp email cho bộ phận CSKH của Yotrip để nhận thông tin)."
            },
            "h3n3": {
                "pt": "Zé dos Anzóis",
                "en": "Car owners and car tenants shall assume all civil and criminal liability if there is a dispute between the two parties if any. Yotrip only serves as a support to the two parties to settle matters in the best possible way, in accordance with the terms, policies and operating regulations both parties have committed to Yotrip.",
                "vi": "Chủ xe và người thuê xe phải chịu mọi trách nhiệm dân sự và hình sự nếu có tranh chấp giữa hai bên nếu có. Yotrip chỉ đóng vai trò hỗ trợ hai bên giải quyết vấn đề một cách tốt nhất có thể, phù hợp với các điều khoản, chính sách và quy chế hoạt động mà hai bên đã cam kết với Yotrip."
            },
        },
    },
    "bestPrice": {
        "title": {
            "pt": "Best Price",
            "en": "Best Price",
            "vi": "Giá tốt nhất"
        },
        "hOwner": {
            "pt": "FOR CAR OWNERS",
            "en": "FOR CAR OWNERS",
            "vi": "ĐỐI VỚI CHỦ XE"
        },
        "hHire": {
            "pt": "FOR CAR HIRE",
            "en": "FOR CAR HIRE",
            "vi": "ĐỐI VỚI NGƯỜI DÙNG XE"
        },
        "h1s1": {
            "pt": "On theYOTRIP app:",
            "en": "On theYOTRIP app:",
            "vi": "Trên ứng dụngYOTRIP:"
        },
        "h1d1": {
            "pt": "each model will be rented at different prices depending on the decision of the car owners and publicly listed. Basically, the price structure of a trip is calculated to include the components:",
            "en": "each model will be rented at different prices depending on the decision of the car owners and publicly listed. Basically, the price structure of a trip is calculated to include the components.",
            "vi": "mỗi dòng xe sẽ được cho thuê với nhiều mức giá khác nhau tùy theo quyết định của các chủ xe và được niêm yết công khai. Về cơ bản, cấu trúc giá của một chuyến đi được tính toán bao gồm các thành phần."
        },
        "h1s2": {
            "pt": "Unit rent: ",
            "en": "Unit rent: ",
            "vi": "Đơn giá thuê: "
        },
        "h1d2": {
            "pt": "Unit rent: ",
            "en": "Is the rent listed by the car owner that you can easily see in the car information section. The rent on Yotrip is calculated in the smallest unit as the day. Car owners can adjust the rent differently for each day, so the cost of renting your car may increase or decrease depending on when you rent the car. Usually, the rent will be higher during weekends and holidays.",
            "vi": "Giá thuê được chủ xe niêm yết mà bạn có thể dễ dàng nhìn thấy trong phần thông tin xe. Giá thuê trên Yotrip được tính theo đơn vị nhỏ nhất là ngày. Các chủ xe có thể điều chỉnh giá thuê khác nhau theo từng ngày, do đó chi phí thuê xe của bạn có thể tăng hoặc giảm tùy thuộc vào thời điểm bạn thuê xe. Thông thường, giá thuê sẽ cao hơn vào cuối tuần và ngày lễ."
        },
        "h1s3": {
            "pt": "Discount",
            "en": "Discount:",
            "vi": "Chiết khấu:"
        },
        "h1d3": {
            "pt": "Some car owners have a discount policy for rides lasting 1 week or 1 month (the average discount is from 5-20% depending on the decision of the car owner). Therefore, if you need to rent a car or long-term work, prioritize choosing these car owners to get a better price.",
            "en": "Some car owners have a discount policy for rides lasting 1 week or 1 month (the average discount is from 5-20% depending on the decision of the car owner). Therefore, if you need to rent a car or long-term work, prioritize choosing these car owners to get a better price.",
            "vi": "Một số chủ xe có chính sách giảm giá cho các chuyến xe kéo dài 1 tuần hoặc 1 tháng (mức chiết khấu trung bình từ 5-20% tùy theo quyết định của chủ xe). Do đó, nếu bạn có nhu cầu thuê xe du lịch hoặc đi công tác dài hạn, hãy ưu tiên chọn những chủ xe này để được giá tốt hơn."
        },
        "h1s4": {
            "pt": "Transportation costs",
            "en": "Transportation costs:",
            "vi": "Chi phí vận chuyển:"
        },
        "h1d4": {
            "pt": "If you don't have a lot of time to go directly to the owner's location to pick up the car, you can choose the car owners who offer additional door-to-door delivery services. The average delivery cost of 5,000-15,000VND/km depends on the decision of the owner as shown in the vehicle information section and will be added to the cost of renting your car.",
            "en": "If you don't have a lot of time to go directly to the owner's location to pick up the car, you can choose the car owners who offer additional door-to-door delivery services. The average delivery cost of 5,000-15,000VND/km depends on the decision of the owner as shown in the vehicle information section and will be added to the cost of renting your car.",
            "vi": "Nếu không có nhiều thời gian đến trực tiếp địa điểm của chủ xe để nhận xe, bạn có thể lựa chọn những chủ xe có thêm dịch vụ giao xe tận nơi. Phí giao xe trung bình từ 5.000-15.000VNĐ / km tùy thuộc vào quyết định của chủ xe như trong phần thông tin xe và sẽ được cộng vào chi phí thuê xe của bạn."
        },
        "h1s5": {
            "pt": "Promo code",
            "en": "Promo code:",
            "vi": "Mã khuyến mại:"
        },
        "h1d5": {
            "pt": "is a discount code that Yotrip sends to its members during promotions, or for close members who trade regularly on the Yotrip app. This promo code will be deducted directly from the cost of renting your car.",
            "en": "is a discount code that Yotrip sends to its members during promotions, or for close members who trade regularly on the Yotrip app. This promo code will be deducted directly from the cost of renting your car.",
            "vi": "là mã giảm giá mà Yotrip gửi cho các thành viên trong các đợt khuyến mại, hoặc cho các thành viên thân thiết giao dịch thường xuyên trên ứng dụng Yotrip. Mã khuyến mãi này sẽ được trừ trực tiếp vào chi phí thuê xe của bạn."
        },
        "h1s6": {
            "pt": "Summary table:",
            "en": "Summary table:",
            "vi": "Bảng tóm tắt:"
        },
        "h1s6n1": {
            "pt": "Car rental fee:",
            "en": "Car rental fee:",
            "vi": "Phí thuê xe:"
        },
        "h1s6d1": {
            "pt": "Single day rent * Number of days (Prices of days may vary).",
            "en": "Single day rent * Number of days (Prices of days may vary).",
            "vi": "Giá thuê một ngày * Số ngày (Giá các ngày có thể thay đổi)."
        },
        "h1s6n2": {
            "pt": "Discount:",
            "en": "Discount:",
            "vi": "Chiết khấu:"
        },
        "h1s6d2": {
            "pt": "% Discount * Car rental fee.",
            "en": "% Discount * Car rental fee.",
            "vi": "% Giảm * Phí thuê xe."
        },
        "h1s6n3": {
            "pt": "Shipping fee:",
            "en": "Shipping fee:",
            "vi": "Phí vận chuyển:"
        },
        "h1s6d3": {
            "pt": "Shipping Unit Price * Number of kilometers.",
            "en": "Shipping Unit Price * Number of kilometers.",
            "vi": "Đơn giá Vận chuyển * Số km."
        },
        "h1s6n4": {
            "pt": "Promotion:",
            "en": "Promotion:",
            "vi": "Khuyến mãi:"
        },
        "h1s6d4": {
            "pt": "% Promotion x (Car rental fee – Discount + Shipping fee).",
            "en": "% Promotion x (Car rental fee – Discount + Shipping fee).",
            "vi": "% Khuyến mại x (Phí thuê xe - Giảm + Phí vận chuyển)."
        },
        "h1s6n5": {
            "pt": "Total trip expenses:",
            "en": "Total trip expenses:",
            "vi": "Tổng chi phí chuyến đi:"
        },
        "h1s6d5": {
            "pt": "Car rental fee - Discount + Shipping fee + Service fee - Promotion.",
            "en": "Car rental fee - Discount + Shipping fee + Service fee - Promotion.",
            "vi": "Phí thuê xe - Giảm giá + Phí vận chuyển + Phí dịch vụ - Khuyến mại."
        },
        "h2n1": {
            "pt": "YOTRIP car owners are entitled to set daily car rental rates for the current month and up to 3 months. You can use YOTRIP's suggested price or can customize the rental price according to your wishes.",
            "en": "YOTRIP car owners are entitled to set daily car rental rates for the current month and up to 3 months. You can use YOTRIP's suggested price or can customize the rental price according to your wishes.",
            "vi": "Chủ sở hữu xe YOTRIP được quyền đặt giá thuê xe theo ngày cho tháng hiện tại và tối đa 3 tháng. Bạn có thể sử dụng giá đề xuất của YOTRIP hoặc có thể tùy chỉnh giá thuê theo ý muốn của mình."
        },
        "h2n2": {
            "pt": "YOTRIP's proposed price is positioned 10% lower than the average car rental price on the market. This price is conducted monthly by Yotrip's market development department for each different model.",
            "en": "YOTRIP's proposed price is positioned 10% lower than the average car rental price on the market. This price is conducted monthly by Yotrip's market development department for each different model.",
            "vi": "Giá đề xuất của YOTRIP được định vị thấp hơn 10% so với giá thuê xe trung bình trên thị trường. Mức giá này được bộ phận phát triển thị trường của Yotrip tiến hành hàng tháng đối với từng dòng xe khác nhau."
        },
    },
    "cookiesPolicy": {
        "title": {
            "pt": "PURPOSE OF USE OF INFORMATION",
            "en": "PURPOSE OF USE OF INFORMATION",
            "vi": "MỤC ĐÍCH SỬ DỤNG THÔNG TIN"
        },
        "heading": {
            "pt": "Privacy cookie spolicy",
            "en": "Privacy cookie spolicy",
            "vi": "Chính sách cookie bảo mật"
        },
        "h1s1": {
            "pt": "SCOPE OF USE OF INFORMATION",
            "en": "SCOPE OF USE OF INFORMATION",
            "vi": "PHẠM VI SỬ DỤNG THÔNG TIN"
        },
        "h1s1d1": {
            "pt": "The company uses the information provided by customers to:",
            "en": "The company uses the information provided by customers to:",
            "vi": "Công ty sử dụng thông tin do khách hàng cung cấp để:"
        },
        "h1s1d2": {
            "pt": "Send notifications about information exchange activities between customers and the Company.",
            "en": "Send notifications about information exchange activities between customers and the Company.",
            "vi": "Gửi các thông báo về các hoạt động trao đổi thông tin giữa khách hàng và Công ty."
        },
        "h1s1d3": {
            "pt": "Prevent activities that destroy the Client's user account or counterfeit customer activities.",
            "en": "Prevent activities that destroy the Client's user account or counterfeit customer activities.",
            "vi": "Ngăn chặn các hoạt động phá hủy tài khoản người dùng của Khách hàng hoặc các hoạt động giả mạo khách hàng."
        },
        "h1s1d4": {
            "pt": "Contact and resolve with the Client in special circumstances.",
            "en": "Contact and resolve with the Client in special circumstances.",
            "vi": "Liên hệ và giải quyết với Khách hàng trong các trường hợp đặc biệt."
        },
        "h1s1d5": {
            "pt": "Do not use the Customer's personal information other than the purpose of confirmation and contact related to booking and vehicle supply.",
            "en": "Do not use the Customer's personal information other than the purpose of confirmation and contact related to booking and vehicle supply.",
            "vi": "Không sử dụng thông tin cá nhân của Khách hàng ngoài mục đích xác nhận và liên hệ liên quan đến việc đặt xe và cung cấp xe."
        },
        "h1s1d6": {
            "pt": "In case of legal requirements: The Company is responsible for cooperating in providing personal information of the Client when requested by judicial agencies including: Procuracies, Courts, Investigating Police Agencies related to certain violations of law of customers. In addition, no one has the right to infringe on the customer's personal information.",
            "en": "In case of legal requirements: The Company is responsible for cooperating in providing personal information of the Client when requested by judicial agencies including: Procuracies, Courts, Investigating Police Agencies related to certain violations of law of customers. In addition, no one has the right to infringe on the customer's personal information.",
            "vi": "Trong trường hợp pháp luật có yêu cầu: Công ty có trách nhiệm hợp tác cung cấp thông tin cá nhân của Khách hàng khi có yêu cầu của cơ quan tư pháp bao gồm: Viện kiểm sát, Tòa án, Cơ quan Cảnh sát điều tra liên quan đến hành vi vi phạm pháp luật nào đó của Khách hàng. Ngoài ra, không ai có quyền xâm phạm thông tin cá nhân của khách hàng."
        },
        "h2s1": {
            "pt": "TIME TO STORE INFORMATION",
            "en": "TIME TO STORE INFORMATION",
            "vi": "THỜI GIAN ĐỂ LƯU TRỮ THÔNG TIN"
        },
        "h2d1": {
            "pt": "The Client's personal data will be stored until a cancellation request is requested or the Customer logs in and performs the cancellation himself. The remaining in all cases the Client's personal information will be secured on the Company's servers.",
            "en": "The Client's personal data will be stored until a cancellation request is requested or the Customer logs in and performs the cancellation himself. The remaining in all cases the Client's personal information will be secured on the Company's servers.",
            "vi": "Dữ liệu cá nhân của Khách hàng sẽ được lưu trữ cho đến khi có yêu cầu hủy hoặc Khách hàng tự đăng nhập và thực hiện việc hủy. Còn lại trong mọi trường hợp thông tin cá nhân của Khách hàng sẽ được bảo mật trên máy chủ của Công ty."
        },
        "h3s1": {
            "pt": "MEANS AND TOOLS FOR USERS TO ACCESS AND EDIT THEIR PERSONAL DATA",
            "en": "MEANS AND TOOLS FOR USERS TO ACCESS AND EDIT THEIR PERSONAL DATA",
            "vi": "THỜI GIAN ĐỂ LƯU TRỮ THÔNG TIN"
        },
        "h3d1": {
            "pt": "Customers have the right to check, update, adjust or cancel their personal information by logging into their account and editing personal information or asking Yotrip.vn to do so.",
            "en": "Customers have the right to check, update, adjust or cancel their personal information by logging into their account and editing personal information or asking Yotrip.vn to do so.",
            "vi": "Khách hàng có quyền kiểm tra, cập nhật, điều chỉnh hoặc hủy bỏ thông tin cá nhân của mình bằng cách đăng nhập vào tài khoản và chỉnh sửa thông tin cá nhân hoặc yêu cầu Yotrip.vn thực hiện."
        },
        "h3d2": {
            "pt": "Customers have the right to submit complaints about the disclosure of personal information to third parties to the Management Board of e-commerce exchanges Yotrip.vn. Upon receiving these responses, Yotrip.vn will reconfirm the information, be responsible for responding to the reasons and instruct the customer to restore and secure the information.",
            "en": "Customers have the right to submit complaints about the disclosure of personal information to third parties to the Management Board of e-commerce exchanges Yotrip.vn. Upon receiving these responses, Yotrip.vn will reconfirm the information, be responsible for responding to the reasons and instruct the customer to restore and secure the information.",
            "vi": "Khách hàng có quyền gửi khiếu nại về việc lộ thông tin cá nhân cho bên thứ 3 đến Ban quản trị của sàn giao dịch thương mại điện tử Yotrip.vn. Khi tiếp nhận những phản hồi này, Yotrip.vn sẽ xác nhận lại thông tin, có trách nhiệm phản hồi lý do và hướng dẫn khách hàng khôi phục và bảo mật lại thông tin."
        },
        "h4s1": {
            "pt": "COMMITMENT TO THE SECURITY OF PERSONAL INFORMATION",
            "en": "COMMITMENT TO THE SECURITY OF PERSONAL INFORMATION",
            "vi": "CAM KẾT BẢO MẬT THÔNG TIN CÁ NHÂN"
        },
        "h4d1": {
            "pt": "Do not use, do not transfer, provide or disclose to any third party members' personal information without the consent of the member.",
            "en": "Do not use, do not transfer, provide or disclose to any third party members' personal information without the consent of the member.",
            "vi": "Không sử dụng, không chuyển giao, cung cấp hay tiết lộ cho bên thứ ba thông tin cá nhân của thành viên khi chưa được sự đồng ý của thành viên."
        },
        "h4d2": {
            "pt": "Personal information of members on e-commerce exchanges Yotrip.vn is committed to absolute confidentiality in accordance with the Yotrip.vn's personal information protection policy. The collection and use of information of each member shall be carried out only with the consent of that customer except in other cases of law.",
            "en": "Personal information of members on e-commerce exchanges Yotrip.vn is committed to absolute confidentiality in accordance with the Yotrip.vn's personal information protection policy. The collection and use of information of each member shall be carried out only with the consent of that customer except in other cases of law.",
            "vi": "Thông tin cá nhân của thành viên trên sàn giao dịch TMĐT Yotrip.vn được cam kết bảo mật tuyệt đối theo chính sách bảo vệ thông tin cá nhân của Yotrip.vn. Việc thu thập và sử dụng thông tin của mỗi thành viên chỉ được thực hiện khi có sự đồng ý của khách hàng đó trừ các trường hợp pháp luật quy định."
        },
        "h4d3": {
            "pt": "In case the server stores information that is hacked resulting in the loss of personal data of the member, the Yotrip.vn will be responsible for notifying the investigating authorities of timely handling and notifying the member.",
            "en": "In case the server stores information that is hacked resulting in the loss of personal data of the member, the Yotrip.vn will be responsible for notifying the investigating authorities of timely handling and notifying the member.",
            "vi": "Trong trường hợp máy chủ lưu trữ thông tin bị hack dẫn đến mất mát dữ liệu cá nhân thành viên, Yotrip.vn sẽ có trách nhiệm thông báo cho cơ quan chức năng điều tra để xử lý và thông báo kịp thời cho thành viên."
        },
        "h4d4": {
            "pt": "Absolute confidentiality of all online transaction information of members including information on accounting invoices of digitized documents in the data area of the safety center level 1 of the Yotrip.vn.",
            "en": "Absolute confidentiality of all online transaction information of members including information on accounting invoices of digitized documents in the data area of the safety center level 1 of the Yotrip.vn.",
            "vi": "Bảo mật tuyệt đối mọi thông tin giao dịch trực tuyến của thành viên bao gồm thông tin hóa đơn kế toán chứng từ số hóa tại khu vực dữ liệu trung tâm an toàn cấp 1 của Yotrip.vn."
        },
        "h4d5": {
            "pt": "The Management Board of the Exchange requires individuals, when registering as a member, to provide all relevant personal information such as: Full name, contact address, email, identity card number, phone phone number, account number, payment card number ...., and is responsible for the legality of the above information. The management board is not responsible for and will not handle all complaints related to the interests of that member if it considers that all the personal information of that member provided during the initial registration is incorrect.",
            "en": "The Management Board of the Exchange requires individuals, when registering as a member, to provide all relevant personal information such as: Full name, contact address, email, identity card number, phone phone number, account number, payment card number ...., and is responsible for the legality of the above information. The management board is not responsible for and will not handle all complaints related to the interests of that member if it considers that all the personal information of that member provided during the initial registration is incorrect.",
            "vi": "Ban quản lý Sàn giao dịch yêu cầu các cá nhân khi đăng ký là thành viên phải cung cấp đầy đủ thông tin cá nhân có liên quan như: Họ và tên, địa chỉ liên lạc, email, số chứng minh nhân dân, điện thoại, số tài khoản, số thẻ thanh toán…. , và chịu trách nhiệm về tính pháp lý của những thông tin trên. Ban quản lý không chịu trách nhiệm và sẽ không giải quyết mọi khiếu nại có liên quan đến quyền lợi của thành viên đó nếu xét thấy tất cả thông tin cá nhân của thành viên đó cung cấp trong quá trình đăng ký lần đầu là không chính xác."
        },
        "h5s1": {
            "pt": "MECHANISM FOR RECEIVING AND SETTLING COMPLAINTS RELATED TO CUSTOMERS' PERSONAL INFORMATION",
            "en": "MECHANISM FOR RECEIVING AND SETTLING COMPLAINTS RELATED TO CUSTOMERS' PERSONAL INFORMATION",
            "vi": "CƠ CHẾ TIẾP NHẬN VÀ GIẢI QUYẾT KHIẾU NẠI LIÊN QUAN ĐẾN THÔNG TIN CÁ NHÂN CỦA KHÁCH HÀNG"
        },
        "h5d1": {
            "pt": "Users have the right to submit complaints related to the implementation of the information security policy to the Management Board of Yotrip E-commerce trading floor. When receiving these feedbacks, Yotrip E-commerce trading floor will re-confirm the information, and have the responsibility to respond to the reason and guide members to restore and secure the information. The steps are as follows:",
            "en": "Users have the right to submit complaints related to the implementation of the information security policy to the Management Board of Yotrip E-commerce trading floor. When receiving these feedbacks, Yotrip E-commerce trading floor will re-confirm the information, and have the responsibility to respond to the reason and guide members to restore and secure the information. The steps are as follows:",
            "vi": "Người dùng có quyền gửi khiếu nại liên quan đến việc thực hiện chính sách bảo mật thông tin đến Ban quản trị của Sàn giao dịch TMĐT Yotrip. Khi tiếp nhận những phản hồi này, Sàn giao dịch TMĐT Yotrip sẽ xác nhận lại thông tin, có trách nhiệm phản hồi lý do và hướng dẫn thành viên khôi phục và bảo mật lại thông tin. Các bước thực hiện như sau:"
        },
        "h5d2": {
            "pt": "Receive complaints Customers send complaints to E-commerce trading floor of Yotrip.vn through channels such as email, phone or send a text directly to the address of the trading floor. The Customer Service Department of the Exchange is responsible for receiving and requesting customers to clearly state the complaint content and provide relevant information and documents.",
            "en": "Receive complaints Customers send complaints to E-commerce trading floor of Yotrip.vn through channels such as email, phone or send a text directly to the address of the trading floor. The Customer Service Department of the Exchange is responsible for receiving and requesting customers to clearly state the complaint content and provide relevant information and documents.",
            "vi": "Tiếp nhận khiếu nại Khách hàng gửi khiếu nại đến Sàn giao dịch TMĐT Yotrip.vn thông qua các kênh như email, điện thoại hoặc gửi văn bản trực tiếp đến địa chỉ của Sàn giao dịch. Bộ phận CSKH của Sở giao dịch có trách nhiệm tiếp nhận và yêu cầu khách hàng nêu rõ nội dung khiếu nại và cung cấp các thông tin, tài liệu liên quan."
        },
        "h5d3": {
            "pt": "Verify the content of the complaint After receiving, the Customer Care Department will base on the complaint content, classify and transfer the complaint content to the Department in charge for handling.",
            "en": "Verify the content of the complaint After receiving, the Customer Care Department will base on the complaint content, classify and transfer the complaint content to the Department in charge for handling.",
            "vi": "Xác minh nội dung khiếu nại Sau khi tiếp nhận, Bộ phận CSKH sẽ căn cứ vào nội dung khiếu nại, phân loại và chuyển nội dung khiếu nại đến Bộ phận phụ trách để xử lý."
        },
        "h5d4": {
            "pt": " Verify the content of the complaint Summarize complaint handling results and provide feedback to customers (call and/or email customers).",
            "en": " Verify the content of the complaint Summarize complaint handling results and provide feedback to customers (call and/or email customers).",
            "vi": "Xác minh nội dung khiếu nại Tổng hợp kết quả xử lý khiếu nại và cung cấp thông tin phản hồi cho khách hàng (gọi điện và / hoặc gửi email cho khách hàng)."
        },
    },
    "faqUser": {
        "titleA": {
            "pt": "VEHICLES",
            "en": "VEHICLES",
            "vi": "PHƯƠNG TIỆN"
        },
        "titleB": {
            "pt": "REPRESENTATION AND PAYMENT OF CAR",
            "en": "REPRESENTATION AND PAYMENT OF CAR",
            "vi": "ĐẠI DIỆN VÀ THANH TOÁN XE"
        },
        "titleC": {
            "pt": "SCHEDULE CHANGES – COURSE CANCELLATION",
            "en": "SCHEDULE CHANGES – COURSE CANCELLATION",
            "vi": "LỊCH TRÌNH THAY ĐỔI - HỦY CHUYẾN ĐI"
        },
        "titleD": {
            "pt": "CAR RENTAL EXPERIENCE",
            "en": "CAR RENTAL EXPERIENCE",
            "vi": "KINH NGHIỆM THUÊ XE"
        },
        "titleE": {
            "pt": "RISK MANAGEMENT",
            "en": "RISK MANAGEMENT",
            "vi": "QUẢN LÝ RỦI RO"
        },
        "h1s1": {
            "pt": "How to register on Yotrip?",
            "en": "How to register on Yotrip?",
            "vi": "Làm thế nào để đăng ký trên Yotrip?"
        },
        "h1d1": {
            "pt": "How to register a car on Yotrip is quite simple, car owners just need to access the Yotrip application or Yotrip.vn website, select 'Personal', select 'My car', select 'Register a rental car' and register the car according to the instructions. In the soonest time, the Yotrip application management board will review and approve your request for registration if the car fully responds to the rental conditions. Or you can fill out the form for Yotrip Customer Care staff to contact you for advice and support to register your car here (Registration Form) You can also see more details on how to register and manage a rental car at the link: guide for car owners (details)",
            "en": "VEHIHow to register a car on Yotrip is quite simple, car owners just need to access the Yotrip application or Yotrip.vn website, select 'Personal', select 'My car', select 'Register a rental car' and register the car according to the instructions. In the soonest time, the Yotrip application management board will review and approve your request for registration if the car fully responds to the rental conditions. Or you can fill out the form for Yotrip Customer Care staff to contact you for advice and support to register your car here (Registration Form) You can also see more details on how to register and manage a rental car at the link: guide for car owners (details)CLES",
            "vi": "Cách đăng ký xe trên Yotrip khá đơn giản, chủ xe chỉ cần truy cập ứng dụng Yotrip hoặc website Yotrip.vn, chọn mục “Cá nhân”, chọn “Xe của tôi”, chọn “Đăng ký thuê xe” và đăng ký xe theo chỉ dẫn. Trong thời gian sớm nhất, ban quản lý ứng dụng Yotrip sẽ xét duyệt yêu cầu đăng ký của bạn nếu xe đáp ứng đầy đủ các điều kiện thuê xe. Hoặc bạn có thể điền thông tin vào form để nhân viên CSKH Yotrip liên hệ tư vấn và hỗ trợ đăng ký xe tại đây (Form đăng ký) Bạn cũng có thể xem thêm chi tiết cách đăng ký và quản lý thuê xe tại link: hướng dẫn đăng ký xe chủ sở hữu (chi tiết)"
        },
        "h2s1": {
            "pt": "What is the procedure for renting a car?",
            "en": "What is the procedure for renting a car?",
            "vi": "Thủ tục thuê xe như thế nào?"
        },
        "h2d1": {
            "pt": "Car owners can set up car rental procedures at 'Personal' -> 'My car' -> 'Vehicle list' -> 'Leasing procedure' -> 'Request car rental documents' Car rental procedures include - Car rental documents: ID card, driving license: car owner compares and returns to tenant. Household registration / KT3 (long-term temporary residence book) / Original Passport: kept by the car owner Vehicle owners can verify their tenant's license at the website of the Ministry of Transport:",
            "en": "Car owners can set up car rental procedures at 'Personal' -> 'My car' -> 'Vehicle list' -> 'Leasing procedure' -> 'Request car rental documents' Car rental procedures include - Car rental documents: ID card, driving license: car owner compares and returns to tenant. Household registration / KT3 (long-term temporary residence book) / Original Passport: kept by the car owner Vehicle owners can verify their tenant's license at the website of the Ministry of Transport:",
            "vi": "Chủ xe có thể làm thủ tục thuê xe tại mục 'Cá nhân' -> 'Xe của tôi' -> 'Danh sách xe' -> 'Thủ tục thuê xe' -> 'Yêu cầu hồ sơ thuê xe' Thủ tục thuê xe bao gồm - Hồ sơ thuê xe: CMND, giấy phép lái xe: chủ xe đối chiếu và trả lại cho người thuê. Đăng ký hộ khẩu"
        },
        "h2d2": {
            "pt": "Deposit property: Motorcycles worth >15 million (with original swing) or 15 million in cash. The car owners will hand over the car with. Notarized copy of car copy or Certificate of Vehicle Circulation (if the car is mortgaged by a bank), Registration certificate and 3. Civil liability insurance. The owner of the car absolutely pays attention NOT to give the original car to the tenant. In addition, car owners need to be legally bound with car hirers by signing a 'self-driving car rental contract' in writing and signing a 'car handover minutes' before and after. when delivering the car (car owners can refer to the contract and minutes according to Yotrip's form, which will be sent to the car owner after successfully registering the car on Yotrip) In order to improve the safety of car rental transactions, Yotrip recommends car owners to fully carry out the process of checking documents, keeping the deposit property, and entering into a written contract 'for car rental'. rent a self-driving car' and sign the 'handover minutes' before and after handing over the car",
            "en": "Deposit property: Motorcycles worth >15 million (with original swing) or 15 million in cash. The car owners will hand over the car with. Notarized copy of car copy or Certificate of Vehicle Circulation (if the car is mortgaged by a bank), Registration certificate and 3. Civil liability insurance. The owner of the car absolutely pays attention NOT to give the original car to the tenant. In addition, car owners need to be legally bound with car hirers by signing a 'self-driving car rental contract' in writing and signing a 'car handover minutes' before and after. when delivering the car (car owners can refer to the contract and minutes according to Yotrip's form, which will be sent to the car owner after successfully registering the car on Yotrip) In order to improve the safety of car rental transactions, Yotrip recommends car owners to fully carry out the process of checking documents, keeping the deposit property, and entering into a written contract 'for car rental'. rent a self-driving car' and sign the 'handover minutes' before and after handing over the car",
            "vi": "Đặt cọc tài sản: Xe máy trị giá> 15 triệu (còn nguyên bản) hoặc 15 triệu tiền mặt. Xe chính chủ nhận bàn giao với. Xe bản sao có công chứng hoặc Giấy chứng nhận lưu hành xe (nếu xe đang thế chấp ngân hàng), Giấy đăng ký và 3. Bảo hiểm trách nhiệm dân sự. Chủ xe lưu ý tuyệt đối KHÔNG giao xe nguyên bản cho khách thuê. Ngoài ra, chủ xe cần ràng buộc về mặt pháp lý với người thuê xe bằng việc ký “hợp đồng thuê xe tự lái” bằng văn bản và trước sau gì cũng ký “biên bản bàn giao xe”. khi giao xe (chủ xe có thể tham khảo hợp đồng và biên bản theo mẫu của Yotrip sẽ gửi cho chủ xe sau khi đăng ký xe thành công trên Yotrip) Nhằm nâng cao tính an toàn trong giao dịch thuê xe, Yotrip khuyến cáo các chủ xe thực hiện đầy đủ quy trình kiểm tra giấy tờ, giữ tài sản đặt cọc, giao kết hợp đồng “cho thuê xe” bằng văn bản. thuê xe ô tô tự lái 'và ký' biên bản bàn giao 'trước và sau khi bàn giao xe."
        },
        "h3s1": {
            "pt": "Quick booking feature",
            "en": "Quick booking feature",
            "vi": "Tính năng đặt vé nhanh"
        },
        "h3d1": {
            "pt": "VEHICLES",
            "en": "Quick booking is one of the outstanding features on Yotrip. If you regularly update your bus schedule and are always sure of the rental schedule, you can adjust 'Quick booking' in the 'Vehicle Info' section to switch to automatic car browsing. Vehicles in the 'Quick Order' mode will be prioritized in the top positions and attach the 'Quick booking' label when the tenant performs a search, so they will receive more orders than the cars in manual browsing mode.However, note that in case the car owner cancels the trip (because he forgot to update the busy schedule) after the customer has made a deposit, the cancellation fee (30% of the order value) will apply. Car owners need to pay attention and make sure to update their busy schedule regularly when putting their car in 'Quick booking' mode. Car owners can set up the quick booking feature at 'Personal' -> 'My car' -> 'Vehicle list' -> 'Vehicle info' -> 'Quick booking' Car owners can customize the 'Quick Booking' mode according to the timelines: next 1 week - next 2 weeks - next 3 weeks - next 4 weeks. All car rental requests during this period will be approved for rental by default if the car is not busy scheduled, the car owner does not need to manually approve the approval on the application. In case a customer is booking a car during the period of 'Fast booking' but the car owner forgets to update the busy schedule or change the rental plan, the car owner should access the application to set a busy schedule and cancel trip in the shortest time, before customers successfully deposit.",
            "vi": "Đặt phòng nhanh chóng là một trong những tính năng nổi bật trên Yotrip. Nếu thường xuyên cập nhật lịch xe và luôn chắc chắn về lịch thuê, bạn có thể điều chỉnh 'Đặt xe nhanh' trong phần 'Thông tin xe' để chuyển sang chế độ duyệt xe tự động. Các xe ở chế độ 'Đặt hàng nhanh' sẽ được ưu tiên ở các vị trí trên cùng và gắn nhãn 'Đặt xe nhanh' khi người thuê thực hiện tìm kiếm, do đó họ sẽ nhận được nhiều đơn hàng hơn các xe ở chế độ duyệt thủ công. Tuy nhiên, lưu ý đề phòng chủ xe hủy chuyến (do quên cập nhật lịch bận) sau khi khách đặt cọc sẽ áp dụng phí hủy chuyến (30% giá trị đơn hàng). Các chủ xe cần lưu ý và đảm bảo cập nhật lịch trình bận rộn thường xuyên khi đưa xe vào chế độ “Đặt xe nhanh”. Chủ xe có thể cài đặt tính năng đặt xe nhanh tại mục 'Cá nhân' -> 'Xe của tôi' -> 'Danh sách xe' -> 'Thông tin xe' -> 'Đặt xe nhanh' Chủ xe có thể tùy chỉnh chế độ 'Đặt xe nhanh' tùy theo các mốc thời gian: 1 tuần tới - 2 tuần tới - 3 tuần tiếp theo - 4 tuần tiếp theo. Tất cả các yêu cầu thuê xe trong thời gian này sẽ được duyệt cho thuê theo mặc định nếu xe không có lịch trình bận, chủ xe không cần phải duyệt thủ công trên ứng dụng. Trường hợp khách hàng đặt xe trong thời gian “Đặt xe nhanh” mà chủ xe quên cập nhật lịch bận hoặc thay đổi kế hoạch thuê xe thì chủ xe vui lòng truy cập ứng dụng để đặt lịch bận và hủy chuyến trong thời gian sớm nhất. thời gian, trước khi khách hàng đặt cọc thành công."
        },
        "h4s1": {
            "pt": "Car Delivery feature",
            "en": "Car Delivery feature",
            "vi": "Tính năng Giao xe"
        },
        "h4d1": {
            "pt": "What is car delivery and how does it work?",
            "en": "What is car delivery and how does it work?",
            "vi": "Giao xe là gì và nó hoạt động như thế nào?"
        },
        "h4d2": {
            "pt": "VEHICLES",
            "en": " Door-to-door delivery is the second outstanding feature of Yotrip application. If you can schedule a time to deliver and pick up your car to tenants in your area, you can set up the 'Delivery to Door' feature to earn extra income and increase competition for your service. your service compared to other car owners on the app. To set up this feature, you access the Yotrip application, select 'Personal' -> 'My Car' -> 'Vehicle List' -> 'Vehicle Info', select 'Delivery' and set up the device. Set up information fields: Within: The range you can deliver the car from the location of your car (1 -> 20km) Fee: Delivery and pick-up fee (from 0 to 20,000 VND/km) Car owners with a free delivery policy will have a 'Free delivery' label below the vehicle image as well as a higher ranking priority when customers search, so they will attract and receive more orders, so car owners can consider this feature for their car.",
            "vi": "Giao hàng tận nơi là tính năng nổi bật thứ hai của ứng dụng Yotrip. Nếu bạn có thể hẹn thời gian giao và nhận xe cho khách thuê trong khu vực của mình, bạn có thể thiết lập tính năng “Giao xe tận nơi” để kiếm thêm thu nhập và tăng tính cạnh tranh cho dịch vụ của mình. dịch vụ của bạn so với các chủ xe khác trên ứng dụng. Để thiết lập tính năng này, bạn truy cập ứng dụng Yotrip, chọn “Cá nhân” -> “Xe của tôi” -> “Danh sách xe” -> “Thông tin xe”, chọn “Giao hàng” và thiết lập thiết bị. Thiết lập các trường thông tin: Trong phạm vi: Phạm vi bạn có thể giao xe tính từ địa điểm chành xe (1 -> 20km) Phí: Phí giao và nhận xe (từ 0 - 20.000đ / km) Chủ xe có chính sách giao xe miễn phí sẽ có nhãn 'Giao hàng miễn phí' bên dưới hình ảnh xe cũng như ưu tiên xếp hạng cao hơn khi khách hàng tìm kiếm nên sẽ thu hút và nhận được nhiều đơn hàng hơn, vì vậy các chủ xe có thể cân nhắc tính năng này cho xe của mình."
        },
        "h4d3": {
            "pt": "What is the car delivery time on Yotrip?",
            "en": "What is the car delivery time on Yotrip?",
            "vi": "Thời gian giao xe trên Yotrip là bao nhiêu?"
        },
        "h4d4": {
            "pt": "Yotrip does not stipulate a specific delivery time, car owners are free to customize their policy of delivery time. The more flexible car owners are in the delivery time, the more competitive the service will be and attract customers.",
            "en": "Yotrip does not stipulate a specific delivery time, car owners are free to customize their policy of delivery time. The more flexible car owners are in the delivery time, the more competitive the service will be and attract customers.",
            "vi": "Yotrip không quy định thời gian giao hàng cụ thể, các chủ xe tự do tùy chỉnh chính sách về thời gian giao hàng. Chủ xe càng linh hoạt trong thời gian giao xe thì dịch vụ càng cạnh tranh và thu hút khách hàng."
        },
        "h5s1": {
            "pt": "Vehicle registration information",
            "en": "Vehicle registration information",
            "vi": "Thông tin đăng ký xe"
        },
        "h5d1": {
            "pt": " Can the car I bought in 2006 be posted?",
            "en": " Can the car I bought in 2006 be posted?",
            "vi": "Xe tôi mua năm 2006 có đăng được không?"
        },
        "h5d2": {
            "pt": "To ensure the safety and quality of cars for renters, Yotrip is assisting in consulting and approving vehicles manufactured from 2005 and up. The car owners ensure that their car meets all safety conditions for the tenant as well as has all legal vehicle documents (car sleeper or vehicle registration certificate (if the car is mortgaged by the bank), registration certificate. , Car insurance). In addition, car owners also need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
            "en": "To ensure the safety and quality of cars for renters, Yotrip is assisting in consulting and approving vehicles manufactured from 2005 and up. The car owners ensure that their car meets all safety conditions for the tenant as well as has all legal vehicle documents (car sleeper or vehicle registration certificate (if the car is mortgaged by the bank), registration certificate. , Car insurance). In addition, car owners also need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
            "vi": "Để đảm bảo an toàn và chất lượng xe cho khách thuê, Yotrip đang hỗ trợ tư vấn và xét duyệt các loại xe được sản xuất từ năm 2005 trở lên. Chủ xe đảm bảo xe của mình đáp ứng đầy đủ các điều kiện an toàn cho người thuê cũng như có đầy đủ giấy tờ xe hợp pháp (xe giường nằm hoặc giấy đăng ký xe (nếu xe đang thế chấp ngân hàng), giấy đăng ký, bảo hiểm xe). Ngoài ra, chủ xe cũng cần tuyệt đối đảm bảo rằng xe thuê đúng với hình ảnh và thông tin đã đăng ký trên ứng dụng Yotrip để giữ uy tín với khách hàng. Mọi trường hợp khách thuê báo cáo vi phạm về việc xe thuê không khớp với hình ảnh và thông tin đăng ký trên Yotrip, ban quản lý ứng dụng sẽ xác minh và xem xét loại bỏ đăng ký xe. ra khỏi hệ thống."
        },
        "h5d3": {
            "pt": "Can I rent out my car that I have mortgaged to a bank?",
            "en": "Can I rent out my car that I have mortgaged to a bank?",
            "vi": "Tôi có thể cho thuê lại chiếc xe mà tôi đã thế chấp cho ngân hàng không?"
        },
        "h5d4": {
            "pt": "If your car has a bank mortgage, it can still be rented on Yotrip. You just need to make sure your car meets the safety requirements for the tenant as well as has all the legal vehicle papers (car license, registration, car insurance).",
            "en": "If your car has a bank mortgage, it can still be rented on Yotrip. You just need to make sure your car meets the safety requirements for the tenant as well as has all the legal vehicle papers (car license, registration, car insurance).",
            "vi": "Nếu ô tô của bạn có thế chấp ngân hàng, nó vẫn có thể được thuê trên Yotrip. Bạn chỉ cần chắc chắn rằng chiếc xe của bạn đáp ứng các yêu cầu an toàn cho người thuê cũng như có đầy đủ giấy tờ xe hợp pháp (bằng xe, đăng ký, bảo hiểm xe)."
        },
        "h5d5": {
            "pt": "Can I get another car picture to post? You cannot get other car pictures to post on Yotrip. According to Yotrip's operating regulations, car owners need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
            "en": "Can I get another car picture to post? You cannot get other car pictures to post on Yotrip. According to Yotrip's operating regulations, car owners need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
            "vi": "Tôi có thể lấy một hình ảnh xe khác để đăng? Bạn không thể lấy hình ảnh xe khác để đăng trên Yotrip. Theo quy chế hoạt động của Yotrip, chủ xe cần tuyệt đối đảm bảo xe thuê đúng với hình ảnh và thông tin đã đăng ký trên ứng dụng Yotrip để giữ uy tín đối với khách hàng. Mọi trường hợp khách thuê báo cáo vi phạm về việc xe thuê không khớp với hình ảnh và thông tin đăng ký trên Yotrip, ban quản lý ứng dụng sẽ xác minh và xem xét loại bỏ đăng ký xe. ra khỏi hệ thống."
        },
        "h6s1": {
            "pt": "Car delivery to the place",
            "en": "Car delivery to the place",
            "vi": "Giao xe tận nơi"
        },
        "h6s2": {
            "pt": "Where is Yotrips address? Where is the parking lot?",
            "en": "Where is Yotrips address? Where is the parking lot?",
            "vi": "Địa chỉ Yotrips ở đâu? Bãi đậu xe ở đâu?"
        },
        "h6d1": {
            "pt": "Yotrip office is located at 305/4 Le Van Sy, Ward 1, Tan Binh, HCMC. Since Yotrip is an application that connects car owners and renters, there will be no parking, car rental customers on the application will choose a car near the customer's area for convenience in car delivery.",
            "en": "Yotrip office is located at 305/4 Le Van Sy, Ward 1, Tan Binh, HCMC. Since Yotrip is an application that connects car owners and renters, there will be no parking, car rental customers on the application will choose a car near the customer's area for convenience in car delivery.",
            "vi": "Văn phòng Yotrip tọa lạc tại 305/4 Lê Văn Sỹ, Phường 1, Tân Bình, TP HCM. Vì Yotrip là ứng dụng kết nối giữa chủ xe và người thuê xe nên sẽ không có chỗ đậu xe, khách hàng thuê xe trên ứng dụng sẽ chọn xe gần khu vực của khách hàng để thuận tiện trong việc giao xe."
        },
        "h6d2": {
            "pt": "Does Yotrip deliver the car to the place? How to find it on Yotrip?",
            "en": "Does Yotrip deliver the car to the place? How to find it on Yotrip?",
            "vi": "Yotrip có giao xe tận nơi không? Làm thế nào để tìm thấy nó trên Yotrip?"
        },
        "h6d3": {
            "pt": "The part of car delivery to the place will depend on the policy of each car owner, the car owner will support delivery within the specified range. To choose whether the car owner has a door-to-door delivery, you choose in the filter section, or on the list of vehicles, it will specify whether the car is delivered or not.",
            "en": "The part of car delivery to the place will depend on the policy of each car owner, the car owner will support delivery within the specified range. To choose whether the car owner has a door-to-door delivery, you choose in the filter section, or on the list of vehicles, it will specify whether the car is delivered or not.",
            "vi": "Phần giao xe tận nơi sẽ tùy thuộc vào chính sách của từng chủ xe, chủ xe sẽ hỗ trợ giao xe trong phạm vi quy định. Để chọn chủ xe có giao xe tận nơi hay không, bạn chọn trong phần bộ lọc, hoặc trong danh sách xe sẽ ghi rõ có xe giao hay không."
        },
        "h6d4": {
            "pt": "How to calculate delivery fee?",
            "en": "How to calculate delivery fee?",
            "vi": "Làm thế nào để tính phí giao hàng?"
        },
        "h6d5": {
            "pt": "The delivery fee applied by Yotrip will be a 2-way delivery fee. For example: The car owner supports the delivery of the car within 10km, the delivery fee is 10k/km. If the delivery distance is 5km, the delivery and pick up fee will be 50k.",
            "en": "The delivery fee applied by Yotrip will be a 2-way delivery fee. For example: The car owner supports the delivery of the car within 10km, the delivery fee is 10k/km. If the delivery distance is 5km, the delivery and pick up fee will be 50k.",
            "vi": "Phí giao hàng mà Yotrip áp dụng sẽ là phí giao hàng 2 chiều. Ví dụ: Chủ xe hỗ trợ giao xe trong phạm vi 10km, phí giao hàng 10k / km. Nếu khoảng cách giao hàng là 5km, phí giao hàng và nhận hàng sẽ là 50k."
        },
        "h6d6": {
            "pt": "How do I change the delivery location?",
            "en": "How do I change the delivery location?",
            "vi": "Làm cách nào để thay đổi địa điểm giao hàng?"
        },
        "h6d7": {
            "pt": "If you want to change the car delivery location without making a deposit, you can cancel the trip and rebook the car to adjust the car delivery location. In case you have made a deposit, you can contact the car owner directly about the car delivery issue.",
            "en": "If you want to change the car delivery location without making a deposit, you can cancel the trip and rebook the car to adjust the car delivery location. In case you have made a deposit, you can contact the car owner directly about the car delivery issue.",
            "vi": "Nếu Quý khách muốn thay đổi địa điểm giao xe mà không cần đặt cọc, Quý khách có thể hủy chuyến và đặt xe lại để điều chỉnh địa điểm giao xe. Trường hợp đã đặt cọc, bạn có thể liên hệ trực tiếp với chủ xe về vấn đề giao xe."
        },
        "h6d8": {
            "pt": "Does Yotrip deliver cars at the airport?",
            "en": "Does Yotrip deliver cars at the airport?",
            "vi": "Yotrip có giao xe tại sân bay không?"
        },
        "h6d9": {
            "pt": "Some car owners on the application have a car delivery service to their place. To order a car for delivery at the airport, you should choose the car near the airport area and support door-to-door delivery. In the car delivery section, you enter the airport address, the system will display the cost of car delivery so that the tenant can conveniently arrange the plan.",
            "en": "Some car owners on the application have a car delivery service to their place. To order a car for delivery at the airport, you should choose the car near the airport area and support door-to-door delivery. In the car delivery section, you enter the airport address, the system will display the cost of car delivery so that the tenant can conveniently arrange the plan.",
            "vi": "Một số chủ xe trên ứng dụng có dịch vụ giao xe tận nơi. Để đặt xe giao hàng tận nơi, quý khách lưu ý chọn những nhà xe gần khu vực sân bay và hỗ trợ giao xe tận nơi. Ở phần giao xe, bạn nhập địa chỉ sân bay, hệ thống sẽ hiển thị chi phí gửi xe để người thuê thuận tiện sắp xếp kế hoạch."
        },
        "h7s0": {
            "pt": "Car rental procedures",
            "en": "Car rental procedures",
            "vi": "Thủ tục thuê xe"
        },
        "h7s1": {
            "pt": "7.1 What documents are required to rent a car on Yotrip? What is collateral?",
            "en": "7.1 What documents are required to rent a car on Yotrip? What is collateral?",
            "vi": "7.1 Cần những giấy tờ gì để thuê xe trên Yotrip? Tài sản thế chấp là gì?"
        },
        "h7d1": {
            "pt": "VEHICLES",
            "en": "Car rental procedures include Car rental documents: ID card, driving license: car owner compares and returns to tenant. Original household registration/KT3 (long-term temporary residence book): the car owner keeps it. Deposit property: Motorbike worth >15 million (with original swing) or 15 million in cash. Note: If the car owner flexibly accepts other alternative documents such as Provincial household registration (original), Passport, the car owner will clearly state 'Accept provincial household registration (original) or Passport' in the Other Terms section. in the Documents required by the tenant.",
            "vi": "Thủ tục thuê xe bao gồm Giấy tờ cho thuê xe: CMND, Giấy phép lái xe: chủ xe đối chiếu và trả lại cho người thuê. Hộ khẩu / KT3 bản gốc (sổ tạm trú dài hạn): xe chính chủ giữ. Đặt cọc tài sản: Xe máy trị giá> 15 triệu (có vung gốc) hoặc 15 triệu tiền mặt. Lưu ý: Nếu chủ xe linh hoạt chấp nhận các giấy tờ thay thế khác như Hộ khẩu tỉnh (bản gốc), Hộ chiếu thì chủ xe ghi rõ “Chấp nhận hộ khẩu tỉnh (bản chính) hoặc Hộ chiếu” tại mục Điều khoản khác. trong các Tài liệu theo yêu cầu của người thuê."
        },
        "h7d2": {
            "pt": "7.2 I have a provincial household registration or no household registration, can I rent it?",
            "en": "7.2 I have a provincial household registration or no household registration, can I rent it?",
            "vi": "7.2 Tôi có hộ khẩu tỉnh hoặc không có hộ khẩu, tôi có thể thuê nhà được không?"
        },
        "h7d3": {
            "pt": "Currently, many car owners on Yotrip support renters with original provincial household registration or original Passport to facilitate more support for out-of-province tenants.",
            "en": "Currently, many car owners on Yotrip support renters with original provincial household registration or original Passport to facilitate more support for out-of-province tenants.",
            "vi": "Hiện tại, nhiều chủ xe trên Yotrip hỗ trợ khách thuê có hộ khẩu gốc tỉnh hoặc Hộ chiếu gốc để tạo điều kiện hỗ trợ nhiều hơn cho khách thuê ngoại tỉnh."
        },
        "h7d4": {
            "pt": "7.3 Can foreigners rent a car on Yotrip?",
            "en": "7.3 Can foreigners rent a car on Yotrip?",
            "vi": "7.3 Người nước ngoài có thể thuê xe hơi trên Yotrip không?"
        },
        "h7d5": {
            "pt": "The delivery fee applied by Yotrip will be a 2-way delivery fee. For example: The car owner supports the delivery of the car within 10km, the delivery fee is 10k/km. If the delivery distance is 5km, the delivery and pick up fee will be 50k.",
            "en": "The delivery fee applied by Yotrip will be a 2-way delivery fee. For example: The car owner supports the delivery of the car within 10km, the delivery fee is 10k/km. If the delivery distance is 5km, the delivery and pick up fee will be 50k.",
            "vi": "Phí giao hàng mà Yotrip áp dụng sẽ là phí giao hàng 2 chiều. Ví dụ: Chủ xe hỗ trợ giao xe trong phạm vi 10km, phí giao hàng 10k / km. Nếu khoảng cách giao hàng là 5km, phí giao hàng và nhận hàng sẽ là 50k."
        },
        "h7d6": {
            "pt": "7.4 How do I change the delivery location?",
            "en": "7.4 How do I change the delivery location?",
            "vi": "7.4 Làm cách nào để thay đổi địa điểm giao hàng?"
        },
        "h7d7": {
            "pt": "If you want to change the car delivery location without making a deposit, you can cancel the trip and rebook the car to adjust the car delivery location. In case you have made a deposit, you can contact the car owner directly about the car delivery issue.",
            "en": "If you want to change the car delivery location without making a deposit, you can cancel the trip and rebook the car to adjust the car delivery location. In case you have made a deposit, you can contact the car owner directly about the car delivery issue.",
            "vi": "Nếu Quý khách muốn thay đổi địa điểm giao xe mà không cần đặt cọc, Quý khách có thể hủy chuyến và đặt xe lại để điều chỉnh địa điểm giao xe. Trường hợp đã đặt cọc, bạn có thể liên hệ trực tiếp với chủ xe về vấn đề giao xe."
        },
        "h7d8": {
            "pt": "7.5 Is it possible to rent a car for someone else to drive?",
            "en": "7.5 Is it possible to rent a car for someone else to drive?",
            "vi": "7.5 Có thể thuê xe cho người khác lái không?"
        },
        "h7d9": {
            "pt": "If you are the one who booked the car and will have someone else drive the car, it is imperative that when you receive the car, you will have to have all the documents the car owner requires to make a contract, and the driver must also go with you for the car owner to check. papers.",
            "en": "If you are the one who booked the car and will have someone else drive the car, it is imperative that when you receive the car, you will have to have all the documents the car owner requires to make a contract, and the driver must also go with you for the car owner to check. papers.",
            "vi": "Nếu bạn là người đặt xe và sẽ có người khác cầm xe thì bắt buộc khi nhận xe bạn phải có đầy đủ các giấy tờ mà chủ xe yêu cầu để làm hợp đồng, và người lái xe cũng phải đi với bạn để chủ xe kiểm tra. giấy tờ."
        },
        "h8s1": {
            "pt": "Submit a car rental request",
            "en": "Submit a car rental request",
            "vi": "Gửi yêu cầu thuê xe"
        },
        "h8d1": {
            "pt": "8.1 Can I send multiple rental requests to different car owners?",
            "en": "8.1 Can I send multiple rental requests to different car owners?",
            "vi": "8.1 Tôi có thể gửi nhiều yêu cầu thuê xe cho các chủ xe khác nhau không?"
        },
        "h8d2": {
            "pt": "Yotrip system allows tenants to send car rental requests to 3 car owners at the same time, and in case you deposit the car you like, the Yotrip system will automatically cancel the remaining 2 cars.",
            "en": "Yotrip system allows tenants to send car rental requests to 3 car owners at the same time, and in case you deposit the car you like, the Yotrip system will automatically cancel the remaining 2 cars.",
            "vi": "Hệ thống Yotrip cho phép người thuê gửi yêu cầu thuê xe cùng lúc cho 3 chủ xe, trường hợp bạn đặt cọc mua xe ưng ý thì hệ thống Yotrip sẽ tự động hủy 2 xe còn lại."
        },
        "h8d3": {
            "pt": "8.2 How long does it take to send a rental request to confirm the booking successfully?",
            "en": "8.2 How long does it take to send a rental request to confirm the booking successfully?",
            "vi": "8.2 Mất bao lâu để gửi yêu cầu thuê để xác nhận đặt phòng thành công?"
        },
        "h8d4": {
            "pt": "The successful booking confirmation time depends on the vehicle owner's feedback and the tenant's deposit payment. Normally, the car owner will check and respond soon, if after 20 minutes from the time the customer sends the request, the car owner has not responded, Yotrip will contact the car owner to remind the car owner to respond. For vehicles that are in Quick Booking mode, the system will agree as soon as the customer submits a rental request. After the owner responds to agree, the tenant will pay the deposit and receive the contact information of the car owner. This is the final step to confirm a successful booking.",
            "en": "The successful booking confirmation time depends on the vehicle owner's feedback and the tenant's deposit payment. Normally, the car owner will check and respond soon, if after 20 minutes from the time the customer sends the request, the car owner has not responded, Yotrip will contact the car owner to remind the car owner to respond. For vehicles that are in Quick Booking mode, the system will agree as soon as the customer submits a rental request. After the owner responds to agree, the tenant will pay the deposit and receive the contact information of the car owner. This is the final step to confirm a successful booking.",
            "vi": "Thời gian xác nhận đặt xe thành công phụ thuộc vào phản hồi của chủ phương tiện và tiền đặt cọc của người thuê. Thông thường chủ xe sẽ kiểm tra và phản hồi sớm, nếu sau 20 phút kể từ khi khách gửi yêu cầu mà chủ xe chưa phản hồi, Yotrip sẽ liên hệ với chủ xe để nhắc chủ xe phản hồi. Đối với những xe đang ở chế độ Đặt xe nhanh, hệ thống sẽ đồng ý ngay khi khách hàng gửi yêu cầu thuê. Sau khi chủ xe phản hồi đồng ý, người thuê sẽ đóng tiền cọc và nhận thông tin liên hệ của chủ xe. Đây là bước cuối cùng để xác nhận đặt vé thành công."
        },
        "h8d5": {
            "pt": "8.3 After booking a car, how do I change the date?",
            "en": "8.3 After booking a car, how do I change the date?",
            "vi": "8.3 Sau khi đặt xe, tôi phải đổi ngày như thế nào?"
        },
        "h8d6": {
            "pt": "If after you complete the deposit and want to change the departure date, then you can handle it in the following cases In case there is a change within 1 hour after the deposit: You can cancel the trip directly and Yotrip will transfer the deposit to your new trip, or refund the deposit to you. In case there is a change after 1 hour, you should call to notify the car owner. If the car owner has an empty car schedule at the time you want to rebook and agrees to change the rental date, Yotrip will support you to rebook a new trip. If the car owner does not support changing the travel date, Yotrip will apply a cancellation policy to the tenant.",
            "en": "If after you complete the deposit and want to change the departure date, then you can handle it in the following cases In case there is a change within 1 hour after the deposit: You can cancel the trip directly and Yotrip will transfer the deposit to your new trip, or refund the deposit to you. In case there is a change after 1 hour, you should call to notify the car owner. If the car owner has an empty car schedule at the time you want to rebook and agrees to change the rental date, Yotrip will support you to rebook a new trip. If the car owner does not support changing the travel date, Yotrip will apply a cancellation policy to the tenant.",
            "vi": "Nếu sau khi đặt cọc xong mà muốn đổi ngày khởi hành thì có thể xử lý theo các trường hợp sau Trường hợp có thay đổi trong vòng 1 tiếng sau khi đặt cọc: Bạn có thể trực tiếp hủy chuyến đi và Yotrip sẽ chuyển tiền đặt cọc cho bạn. chuyến đi mới, hoặc hoàn lại tiền đặt cọc cho bạn. Trường hợp sau 1h có thay đổi thì nên gọi điện thông báo cho chủ xe. Nếu chủ xe còn lịch xe trống tại thời điểm bạn muốn đặt lại và đồng ý đổi ngày thuê, Yotrip sẽ hỗ trợ bạn đặt lại chuyến mới. Nếu chủ xe không hỗ trợ đổi ngày đi, Yotrip sẽ áp dụng chính sách hủy chuyến cho khách thuê."
        },
        "h8d7": {
            "pt": "8.4 Forgot to enter promo code, how to handle? Can I enter the promo code more than once?",
            "en": "8.4 Forgot to enter promo code, how to handle? Can I enter the promo code more than once?",
            "vi": "8.4 Quên nhập mã khuyến mãi, cách xử lý? Tôi có thể nhập mã khuyến mãi nhiều lần không?"
        },
        "h8d8": {
            "pt": "In case you have made a deposit but forgot to enter the promotion code, Yotrip can support to cancel the trip and update the promotion code for you. And the promo code is applied once for a successful trip.",
            "en": "In case you have made a deposit but forgot to enter the promotion code, Yotrip can support to cancel the trip and update the promotion code for you. And the promo code is applied once for a successful trip.",
            "vi": "Trong trường hợp bạn đã đặt cọc nhưng quên nhập mã khuyến mãi, Yotrip có thể hỗ trợ hủy chuyến và cập nhật mã khuyến mãi cho bạn. Và mã khuyến mãi được áp dụng một lần cho chuyến đi thành công."
        },
        "h9s1": {
            "pt": "Deposit",
            "en": "Deposit",
            "vi": "Gửi tiền"
        },
        "h9d1": {
            "pt": "9.1 Do I need to make a deposit ? Deposit how?",
            "en": "9.1 Do I need to make a deposit ? Deposit how?",
            "vi": "9.1 Tôi có cần đặt cọc không? Đặt cọc bằng cách nào?"
        },
        "h9d2": {
            "pt": "When the car owner agrees to rent, you will make a deposit of 30% of the trip value in advance to show your goodwill to rent the car as well as to make sure the car owner will keep the car for you. To make a deposit, there are many payment methods, you can refer to the Payment Guide",
            "en": "When the car owner agrees to rent, you will make a deposit of 30% of the trip value in advance to show your goodwill to rent the car as well as to make sure the car owner will keep the car for you. To make a deposit, there are many payment methods, you can refer to the Payment Guide",
            "vi": "Khi chủ xe đồng ý cho thuê, bạn sẽ đặt cọc trước 30% giá trị chuyến đi để thể hiện thiện chí thuê xe cũng như chắc chắn chủ xe sẽ giữ xe cho bạn. Để nạp tiền, có nhiều phương thức thanh toán, bạn có thể tham khảo Hướng dẫn thanh toán"
        },
        "h9d3": {
            "pt": "9.2 After successful deposit, what do I need to do?",
            "en": "9.2 After successful deposit, what do I need to do?",
            "vi": "9.2 Sau khi nạp tiền thành công, tôi cần làm gì?"
        },
        "h9d4": {
            "pt": "After a successful deposit, you will receive a notification of the phone number of the car owner, you should actively contact the car owner to discuss more details about the paperwork as well as the time to deliver the car. If you cannot agree with the vehicle owner on the required procedures, it is necessary to cancel the trip on the system within 1 hour.",
            "en": "After a successful deposit, you will receive a notification of the phone number of the car owner, you should actively contact the car owner to discuss more details about the paperwork as well as the time to deliver the car. If you cannot agree with the vehicle owner on the required procedures, it is necessary to cancel the trip on the system within 1 hour.",
            "vi": "Sau khi đặt cọc thành công sẽ nhận được thông báo số điện thoại của chủ xe, bạn nên chủ động liên hệ với chủ xe để trao đổi chi tiết hơn về thủ tục giấy tờ cũng như thời gian giao xe. Nếu không thống nhất được với chủ phương tiện về các thủ tục cần thiết, cần thực hiện hủy chuyến trên hệ thống trong vòng 1 giờ."
        },
        "bh1s1": {
            "pt": "Car rental contract: Do you need to sign a contract or legal document to rent a car?",
            "en": "Car rental contract: Do you need to sign a contract or legal document to rent a car?",
            "vi": "Hợp đồng thuê xe: Thuê xe có cần ký hợp đồng hay giấy tờ pháp lý không?"
        },
        "bh1d1": {
            "pt": "When receiving the car, to ensure the interests of both parties and settle disputes when there is a risk, you will sign a contract and a record of car handover with the vehicle owner, this contract will be made in 2 copies and each party 1 copy will be kept.",
            "en": "When receiving the car, to ensure the interests of both parties and settle disputes when there is a risk, you will sign a contract and a record of car handover with the vehicle owner, this contract will be made in 2 copies and each party 1 copy will be kept.",
            "vi": "Khi nhận xe, để đảm bảo quyền lợi của hai bên và giải quyết tranh chấp khi có rủi ro xảy ra, quý khách sẽ ký hợp đồng và biên bản bàn giao xe với chủ xe, hợp đồng này được lập thành 2 bản và mỗi bên 1 bản. sẽ được giữ."
        },
        "bh2s1": {
            "pt": "Car rental management",
            "en": "Car rental management",
            "vi": "Quản lý cho thuê xe"
        },
        "bh2d1": {
            "pt": "2.1 How to check a car before renting?",
            "en": "2.1 How to check a car before renting?",
            "vi": "2.1 Làm thế nào để kiểm tra xe trước khi thuê?"
        },
        "bh2d2": {
            "pt": "After a successful deposit, you will receive an SMS and a notification of the vehicle owner's contact information. You can contact the car owner and arrange the nearest time to check the condition and operation of the vehicle.",
            "en": "After a successful deposit, you will receive an SMS and a notification of the vehicle owner's contact information. You can contact the car owner and arrange the nearest time to check the condition and operation of the vehicle.",
            "vi": "Sau khi đặt cọc thành công, bạn sẽ nhận được tin nhắn SMS và thông báo về thông tin liên lạc của chủ xe. Bạn có thể liên hệ với chủ xe và sắp xếp thời gian gần nhất để đến kiểm tra tình trạng và hoạt động của xe."
        },
        "bh2d3": {
            "pt": "2.2 Fines for traffic violations? Who pays tolls? Parking area ?",
            "en": "2.2 Fines for traffic violations? Who pays tolls? Parking area ?",
            "vi": "2.2 Mức phạt khi vi phạm giao thông? Ai trả phí cầu đường? Bãi đỗ xe ?"
        },
        "bh2d4": {
            "pt": "For self-driving car rental, in case the tenant commits a traffic violation due to the tenant's fault, the traffic violation fee is entirely responsible for the lessee. This provision is clearly stated in the car rental contract. All costs of tolls, parking lot tenants will also pay themselves in cases of arising.",
            "en": "For self-driving car rental, in case the tenant commits a traffic violation due to the tenant's fault, the traffic violation fee is entirely responsible for the lessee. This provision is clearly stated in the car rental contract. All costs of tolls, parking lot tenants will also pay themselves in cases of arising.",
            "vi": "Đối với hình thức thuê xe tự lái, trong trường hợp người thuê vi phạm giao thông do lỗi của người thuê thì người thuê hoàn toàn chịu trách nhiệm về phí vi phạm giao thông. Điều khoản này đã được ghi rõ trong hợp đồng thuê xe. Mọi chi phí cầu đường, khách thuê bãi giữ xe cũng sẽ tự chi trả trong các trường hợp phát sinh."
        },
        "bh2d5": {
            "pt": "2.3 Who pays for gas?",
            "en": "2.3 Who pays for gas?",
            "vi": "2.3 Ai trả tiền xăng?"
        },
        "bh2d6": {
            "pt": "The tenant will be the one to pay for gas during the rental process. When delivering the car to the tenant, the owner will specify the level of gas. When returning the car, the lessee is responsible for paying extra for the car owner for the missing gas or can actively refuel the car owner with the same level of gas at the time of receiving the car.",
            "en": "The tenant will be the one to pay for gas during the rental process. When delivering the car to the tenant, the owner will specify the level of gas. When returning the car, the lessee is responsible for paying extra for the car owner for the missing gas or can actively refuel the car owner with the same level of gas at the time of receiving the car.",
            "vi": "Người thuê sẽ là người trả tiền xăng trong quá trình thuê. Khi giao xe cho khách thuê, chủ xe sẽ ghi rõ mức xăng. Khi trả xe, bên thuê có trách nhiệm thanh toán thêm cho chủ xe phần xăng còn thiếu hoặc có thể chủ động đổ xăng cho chủ xe với mức xăng tương đương tại thời điểm nhận xe."
        },
        "bh2d7": {
            "pt": "2.4 Car cleaning?",
            "en": "2.4 Car cleaning?",
            "vi": "2.4 Làm sạch xe?"
        },
        "bh2d8": {
            "pt": "When delivering the car, the owner will deliver a clean car to the tenant. At the end of the trip, the tenant needs to clean or wash it before handing it over to the owner. The vehicle owner may charge an additional fee for washing or cleaning the vehicle if the vehicle is dirty or has a bad smell.",
            "en": "When delivering the car, the owner will deliver a clean car to the tenant. At the end of the trip, the tenant needs to clean or wash it before handing it over to the owner. The vehicle owner may charge an additional fee for washing or cleaning the vehicle if the vehicle is dirty or has a bad smell.",
            "vi": "Khi giao xe, chủ xe sẽ giao xe sạch sẽ cho khách thuê. Khi kết thúc chuyến đi, người thuê cần thu dọn hoặc rửa sạch sẽ trước khi giao lại cho chủ. Chủ xe có thể tính thêm phí rửa xe nếu xe bị bẩn hoặc có mùi hôi."
        },
        "bh3s1": {
            "pt": "Evaluation after the trip",
            "en": "Evaluation after the trip",
            "vi": "Đánh giá sau chuyến đi"
        },
        "bh3d1": {
            "pt": "How to send a review to the car owner after the trip? After clicking the end of the trip, the application will display the evaluation section. Tenants can write reviews about the car's quality and service. In case the guest does not submit a review, 9 days after the end of the trip, the system will automatically rate the car owner 5 *.",
            "en": "How to send a review to the car owner after the trip? After clicking the end of the trip, the application will display the evaluation section. Tenants can write reviews about the car's quality and service. In case the guest does not submit a review, 9 days after the end of the trip, the system will automatically rate the car owner 5 *.",
            "vi": "Làm thế nào để gửi đánh giá cho chủ xe sau chuyến đi? Sau khi bấm kết thúc chuyến đi, ứng dụng sẽ hiển thị phần đánh giá. Người thuê có thể viết đánh giá về chất lượng và dịch vụ của chiếc xe. Trường hợp khách không gửi đánh giá, 9 ngày sau khi kết thúc chuyến đi, hệ thống sẽ tự động đánh giá chủ xe 5 *."
        },
        "ch1s1": {
            "pt": "Cancel the trip after deposit",
            "en": "Cancel the trip after deposit",
            "vi": "Hủy chuyến đi sau khi đặt cọc"
        },
        "ch1d1": {
            "pt": "1.1 If there is a problem, how can I contact Yotrip for support?",
            "en": "1.1 If there is a problem, how can I contact Yotrip for support?",
            "vi": "1.1 Nếu có vấn đề, tôi có thể liên hệ với Yotrip để được hỗ trợ bằng cách nào?"
        },
        "ch1d2": {
            "pt": "Tenants can contact Hotline 19009217 (during office hours) or message Yotrip Fanpage for the earliest support.",
            "en": "Tenants can contact Hotline 19009217 (during office hours) or message Yotrip Fanpage for the earliest support.",
            "vi": "Khách thuê có thể liên hệ Hotline 19009217 (trong giờ hành chính) hoặc nhắn tin trên Fanpage Yotrip để được hỗ trợ sớm nhất."
        },
        "ch1d3": {
            "pt": "1.2 What do I need to do if I want to cancel my trip after making a deposit?",
            "en": "1.2 What do I need to do if I want to cancel my trip after making a deposit?",
            "vi": "1.2 Tôi cần làm gì nếu muốn hủy chuyến đi sau khi đặt cọc?"
        },
        "ch1d4": {
            "pt": "Tenants can go to the Trip section, select the trip they want to cancel, click Cancel trip and enter the reason for the cancellation to cancel the trip.",
            "en": "Tenants can go to the Trip section, select the trip they want to cancel, click Cancel trip and enter the reason for the cancellation to cancel the trip.",
            "vi": "Người thuê có thể vào mục Chuyến đi, chọn chuyến muốn hủy, bấm Hủy chuyến và nhập lý do hủy để hủy chuyến."
        },
        "ch1d5": {
            "pt": "1.3 Can I get a refund if I change my schedule after a deposit is made?",
            "en": "1.3 Can I get a refund if I change my schedule after a deposit is made?",
            "vi": "1.3 Tôi có thể được hoàn lại tiền nếu tôi thay đổi lịch trình sau khi đặt cọc không?"
        },
        "ch1d6": {
            "pt": "According to the cancellation policy, if the tenant cancels: Within 1 hour after deposit, 100% of deposit will be refunded. More than 7 days before the trip, 70% of the deposit will be refunded. 7 days or less before the trip, the deposit will not be refunded. In case the lessee and the car owner have a separate agreement on the deposit, Yotrip will follow the mutual agreement of the two parties, if not, the cancellation policy will be followed.",
            "en": "According to the cancellation policy, if the tenant cancels: Within 1 hour after deposit, 100% of deposit will be refunded. More than 7 days before the trip, 70% of the deposit will be refunded. 7 days or less before the trip, the deposit will not be refunded. In case the lessee and the car owner have a separate agreement on the deposit, Yotrip will follow the mutual agreement of the two parties, if not, the cancellation policy will be followed.",
            "vi": "Theo chính sách hủy phòng, nếu khách hàng hủy: Trong vòng 1 giờ sau khi đặt cọc, sẽ hoàn lại 100% tiền cọc. Hơn 7 ngày trước chuyến đi, 70% số tiền đặt cọc sẽ được hoàn lại. 7 ngày hoặc ít hơn trước chuyến đi, tiền đặt cọc sẽ không được hoàn lại. Trường hợp người thuê và chủ xe có thỏa thuận riêng về việc đặt cọc, Yotrip sẽ thực hiện theo thỏa thuận chung của hai bên, nếu không, sẽ thực hiện theo chính sách hủy đặt cọc."
        },
        "ch2s1": {
            "pt": "The car owner cancels the trip",
            "en": "The car owner cancels the trip",
            "vi": "Chủ xe hủy chuyến"
        },
        "ch2d1": {
            "pt": "I made a deposit but the car owner canceled my trip, how to handle it? You can book another car on the app or contact Yotrip via Hotline 19009217 or text Yotrip Fanpage for early support. If during business hours, Yotrip staff will contact you to help you find another car and verify the cancellation error to handle according to the cancellation policy. See cancellation policy here.",
            "en": "I made a deposit but the car owner canceled my trip, how to handle it? You can book another car on the app or contact Yotrip via Hotline 19009217 or text Yotrip Fanpage for early support. If during business hours, Yotrip staff will contact you to help you find another car and verify the cancellation error to handle according to the cancellation policy. See cancellation policy here.",
            "vi": "Tôi đã đặt cọc nhưng bị chủ xe hủy chuyến thì xử lý như thế nào? Bạn có thể đặt xe khác trên ứng dụng hoặc liên hệ với Yotrip qua Hotline 19009217 hoặc nhắn tin qua Fanpage Yotrip để được hỗ trợ sớm. Nếu trong giờ làm việc, nhân viên Yotrip sẽ liên hệ hỗ trợ bạn tìm xe khác và xác minh lỗi hủy chuyến để xử lý theo chính sách hủy chuyến. Xem chính sách hủy tại đây."
        },
        "ch3s1": {
            "pt": "End the trip early",
            "en": "End the trip early",
            "vi": "Kết thúc chuyến đi sớm"
        },
        "ch3d1": {
            "pt": "I want to end the trip early, what should I do? Tenants can contact the car owner to arrange a time to get the car back. In case of need to update trip information, tenants contact Yotrip via Hotline 19009217 or Fanpage Yotrip for support and update.",
            "en": "I want to end the trip early, what should I do? Tenants can contact the car owner to arrange a time to get the car back. In case of need to update trip information, tenants contact Yotrip via Hotline 19009217 or Fanpage Yotrip for support and update.",
            "vi": "Tôi muốn kết thúc chuyến đi sớm thì phải làm sao? Khách thuê có thể liên hệ chủ xe để sắp xếp thời gian nhận xe. Trong trường hợp cần cập nhật thông tin chuyến đi, khách thuê liên hệ với Yotrip qua Hotline 19009217 hoặc Fanpage Yotrip để được hỗ trợ và cập nhật."
        },
        "ch4s1": {
            "pt": "Refunds",
            "en": "Refunds",
            "vi": "Tiền hoàn lại"
        },
        "ch4d1": {
            "pt": "Refund time? How long does it take to get a refund? From the date of confirmation of the refund, Yotrip's accounting department will transfer the money to the tenant within the next 3 working days (except Saturday, Sunday, public holiday and New Year).",
            "en": "Refund time? How long does it take to get a refund? From the date of confirmation of the refund, Yotrip's accounting department will transfer the money to the tenant within the next 3 working days (except Saturday, Sunday, public holiday and New Year).",
            "vi": "Thời gian hoàn tiền? Mất bao lâu để được hoàn lại tiền? Kể từ ngày xác nhận hoàn tiền, bộ phận kế toán của Yotrip sẽ chuyển tiền cho khách thuê trong vòng 3 ngày làm việc tiếp theo (trừ thứ bảy, chủ nhật, ngày lễ, Tết)."
        },
        "dh1s1": {
            "pt": "Book a car",
            "en": "Book a car",
            "vi": "Đặt xe"
        },
        "dh1d1": {
            "pt": "1.1 After ordering a car, it takes time to wait for the car owner to approve, is there any other way faster?",
            "en": "1.1 After ordering a car, it takes time to wait for the car owner to approve, is there any other way faster?",
            "vi": "1.1 Sau khi đặt xe, bạn phải mất thời gian chờ chủ xe duyệt, có cách nào khác nhanh hơn không?"
        },
        "dh1d2": {
            "pt": "Tenants can order 3 cars at the same time or put the cars in the Express booking status to be able to make a deposit and contact the car owner immediately.",
            "en": "Tenants can order 3 cars at the same time or put the cars in the Express booking status to be able to make a deposit and contact the car owner immediately.",
            "vi": "Khách thuê có thể đặt 3 xe cùng lúc hoặc đặt xe ở trạng thái Đặt xe Nhanh để có thể đặt cọc và liên hệ ngay với chủ xe."
        },
        "dh1d3": {
            "pt": "1.2 How is the experience of booking a car on Yotrip?",
            "en": "1.2 How is the experience of booking a car on Yotrip?",
            "vi": "1.2 Kinh nghiệm đặt xe trên Yotrip như thế nào?"
        },
        "dh1d4": {
            "pt": "Tenants can refer to some experiences: Choose a car owner with quick response, high approval rate, good comments from rented guests. Vehicle has insurance, beautiful pictures, complete and clear information. Put the car in Quick Book state and book 3 cars at the same time. Refer to the current promo codes and choose the best offer.",
            "en": "Tenants can refer to some experiences: Choose a car owner with quick response, high approval rate, good comments from rented guests. Vehicle has insurance, beautiful pictures, complete and clear information. Put the car in Quick Book state and book 3 cars at the same time. Refer to the current promo codes and choose the best offer.",
            "vi": "Khách thuê có thể tham khảo một số kinh nghiệm: Chọn chủ xe phản ứng nhanh, tỷ lệ chấp thuận cao, nhận xét tốt từ khách thuê. Xe có BH, hình ảnh đẹp, thông tin đầy đủ, rõ ràng. Đưa xe vào trạng thái Sách Nhanh và đặt 3 xe cùng lúc. Tham khảo các mã khuyến mãi hiện tại và chọn ưu đãi tốt nhất."
        },
        "dh2s1": {
            "pt": "Car delivery",
            "en": "Car delivery",
            "vi": "Giao xe"
        },
        "dh2d1": {
            "pt": "2.1 What should be noted when receiving a car with the owner to limit disputes?",
            "en": "2.1 What should be noted when receiving a car with the owner to limit disputes?",
            "vi": "2.1 Cần lưu ý những gì khi nhận xe chính chủ để hạn chế tranh chấp?"
        },
        "dh2d2": {
            "pt": "To dispute when receiving the car, the lessee can: Contact to discuss and agree with the car owner on documents, procedures, time and address for delivery and receipt of the car right after the deposit. Bring the documents as exchanged and signed the Car Rental Contract, Full Car Handover Minute, each party keeps one copy. Take photos, record videos of documents and vehicle status when receiving the car.",
            "en": "To dispute when receiving the car, the lessee can: Contact to discuss and agree with the car owner on documents, procedures, time and address for delivery and receipt of the car right after the deposit. Bring the documents as exchanged and signed the Car Rental Contract, Full Car Handover Minute, each party keeps one copy. Take photos, record videos of documents and vehicle status when receiving the car.",
            "vi": "Để xảy ra tranh chấp khi nhận xe, bên thuê xe có thể: Liên hệ trao đổi, thống nhất với chủ xe về hồ sơ, thủ tục, thời gian, địa chỉ giao nhận xe ngay sau khi đặt cọc. Mang theo các giấy tờ như đã trao đổi và đã ký Hợp đồng thuê xe, Biên bản bàn giao xe đầy đủ, mỗi bên giữ một bản. Chụp ảnh, quay phim tài liệu và tình trạng xe khi nhận xe."
        },
        "dh2d3": {
            "pt": "2.2 Evaluation after the trip",
            "en": "2.2 Evaluation after the trip",
            "vi": "2.2 Đánh giá sau chuyến đi"
        },
        "dh2d4": {
            "pt": "Are the tenant reviews 100% correct? After the end of the trip, the car owner will evaluate the tenant and the tenant will evaluate the quality of the car and the service of the car owner. These reviews are 100% factual and valuable as a reference if you want to book a car rental.",
            "en": "Are the tenant reviews 100% correct? After the end of the trip, the car owner will evaluate the tenant and the tenant will evaluate the quality of the car and the service of the car owner. These reviews are 100% factual and valuable as a reference if you want to book a car rental.",
            "vi": "Những đánh giá của người thuê có đúng 100% không? Sau khi kết thúc chuyến đi, chủ xe sẽ đánh giá khách thuê và khách thuê sẽ đánh giá chất lượng xe và dịch vụ của chủ xe. Những đánh giá này là thực tế 100% và có giá trị tham khảo nếu bạn muốn đặt thuê xe."
        },
        "eh1s1": {
            "pt": "Yotrip support when there is a problem: If there is a problem, how do you contact Yotrip for support?",
            "en": "Yotrip support when there is a problem: If there is a problem, how do you contact Yotrip for support?",
            "vi": "Hỗ trợ Yotrip khi có sự cố: Nếu có sự cố, bạn liên hệ với Yotrip để được hỗ trợ như thế nào?"
        },
        "eh1d1": {
            "pt": "Tenants can contact Hotline 19009217 (during office hours) or leave a message via Fanpage Yotrip for support as soon as possible.",
            "en": "Tenants can contact Hotline 19009217 (during office hours) or leave a message via Fanpage Yotrip for support as soon as possible.",
            "vi": "Khách thuê có thể liên hệ Hotline 19009217 (trong giờ hành chính) hoặc để lại tin nhắn qua Fanpage Yotrip để được hỗ trợ trong thời gian sớm nhất."
        },
        "eh2s1": {
            "pt": "Trip insurance package",
            "en": "Trip insurance package",
            "vi": "Gói bảo hiểm chuyến đi"
        },
        "eh2d1": {
            "pt": "2.1 Renting a car but afraid of unexpected problems, does Yotrip have any protection package?",
            "en": "2.1 Renting a car but afraid of unexpected problems, does Yotrip have any protection package?",
            "vi": "2.1 Thuê xe nhưng sợ phát sinh sự cố không mong muốn, Yotrip có gói bảo vệ nào không?"
        },
        "eh2d2": {
            "pt": "Currently, Yotrip has a MIC Insurance package to support tenants in case of a collision with a maximum deductible of 2 million/case.",
            "en": "Currently, Yotrip has a MIC Insurance package to support tenants in case of a collision with a maximum deductible of 2 million/case.",
            "vi": "Hiện Yotrip đang có gói Bảo hiểm MIC hỗ trợ khách thuê trong trường hợp va chạm với mức khấu trừ tối đa 2 triệu / trường hợp."
        },
        "eh2d3": {
            "pt": "2.2 I rent a car with trip insurance, who should I contact when I have a problem or how to handle it?",
            "en": "2.2 I rent a car with trip insurance, who should I contact when I have a problem or how to handle it?",
            "vi": "2.2 Tôi thuê xe có bảo hiểm chuyến đi, tôi nên liên hệ với ai khi gặp sự cố hoặc cách xử lý?"
        },
        "eh2d4": {
            "pt": "In case you have problems while renting a car with insurance support, Yotrip recommends that you: - Contact and notify the car owner about the problem being encountered so that the car owner knows the situation. - Take pictures of the incident scene and contact MIC Insurance switchboard 1900558891 to report the problem and receive appropriate handling instructions. - If you can't contact MIC Insurance, you can contact Yotrip hotline 19009217 (9AM - 6PM, T2 - T7) or message Yotrip Fanpage for advice and timely support. Note: MIC insurance only supports problems during the time you book a rental on the Yotrip app. Therefore, you need to report the incident as soon as it occurs to be recognized and supported for compensation.",
            "en": "In case you have problems while renting a car with insurance support, Yotrip recommends that you: - Contact and notify the car owner about the problem being encountered so that the car owner knows the situation. - Take pictures of the incident scene and contact MIC Insurance switchboard 1900558891 to report the problem and receive appropriate handling instructions. - If you can't contact MIC Insurance, you can contact Yotrip hotline 19009217 (9AM - 6PM, T2 - T7) or message Yotrip Fanpage for advice and timely support. Note: MIC insurance only supports problems during the time you book a rental on the Yotrip app. Therefore, you need to report the incident as soon as it occurs to be recognized and supported for compensation.",
            "vi": "Trong trường hợp bạn gặp sự cố khi thuê xe có hỗ trợ bảo hiểm, Yotrip khuyên bạn nên: - Liên hệ và thông báo với chủ xe về sự cố đang gặp phải để chủ xe biết tình hình. - Chụp ảnh hiện trường sự cố và liên hệ tổng đài 1900558891 của Bảo hiểm MIC để thông báo sự cố và nhận hướng dẫn xử lý phù hợp. - Nếu không liên hệ được với Bảo hiểm MIC, bạn có thể liên hệ hotline Yotrip 19009217 (9h - 18h, T2 - T7) hoặc nhắn tin đến Fanpage Yotrip để được tư vấn và hỗ trợ kịp thời. Lưu ý: Bảo hiểm MIC chỉ hỗ trợ các sự cố trong thời gian bạn đặt thuê trên ứng dụng Yotrip. Vì vậy, bạn cần trình báo sự việc ngay khi xảy ra để được ghi nhận và hỗ trợ bồi thường."
        },
        "eh3s1": {
            "pt": "Car delivery",
            "en": "Car delivery",
            "vi": "Giao xe"
        },
        "eh3d1": {
            "pt": "3.1 What should be noted when receiving a car with the owner to limit disputes?",
            "en": "3.1 What should be noted when receiving a car with the owner to limit disputes?",
            "vi": "3.1 Cần lưu ý những gì khi nhận xe chính chủ để hạn chế tranh chấp?"
        },
        "eh3d2": {
            "pt": "To dispute when receiving the car, the lessee can: Contact to discuss and agree with the car owner on documents, procedures, time and address for delivery and receipt of the car right after the deposit. Bring the documents as exchanged and signed the Car Rental Contract, Full Car Handover Minute, each party keeps one copy. Take photos, record videos of documents and vehicle status when receiving the car.",
            "en": "To dispute when receiving the car, the lessee can: Contact to discuss and agree with the car owner on documents, procedures, time and address for delivery and receipt of the car right after the deposit. Bring the documents as exchanged and signed the Car Rental Contract, Full Car Handover Minute, each party keeps one copy. Take photos, record videos of documents and vehicle status when receiving the car.",
            "vi": "Để xảy ra tranh chấp khi nhận xe, bên thuê xe có thể: Liên hệ trao đổi, thống nhất với chủ xe về hồ sơ, thủ tục, thời gian, địa chỉ giao nhận xe ngay sau khi đặt cọc. Mang theo các giấy tờ như đã trao đổi và đã ký Hợp đồng thuê xe, Biên bản bàn giao xe đầy đủ, mỗi bên giữ một bản. Chụp ảnh, quay phim tài liệu và tình trạng xe khi nhận xe."
        },
        "eh3d3": {
            "pt": "3.2 Evaluation after the trip",
            "en": "3.2 Evaluation after the trip",
            "vi": "3.2 Đánh giá sau chuyến đi"
        },
        "eh3d4": {
            "pt": "Are the tenant reviews 100% correct? After the end of the trip, the car owner will evaluate the tenant and the tenant will evaluate the quality of the car and the service of the car owner. These reviews are 100% factual and valuable as a reference if you want to book a car rental.",
            "en": "Are the tenant reviews 100% correct? After the end of the trip, the car owner will evaluate the tenant and the tenant will evaluate the quality of the car and the service of the car owner. These reviews are 100% factual and valuable as a reference if you want to book a car rental.",
            "vi": "Những đánh giá của người thuê có đúng 100% không? Sau khi kết thúc chuyến đi, chủ xe sẽ đánh giá khách thuê và khách thuê sẽ đánh giá chất lượng xe và dịch vụ của chủ xe. Những đánh giá này là thực tế 100% và có giá trị tham khảo nếu bạn muốn đặt thuê xe."
        },
    },
    "faqOwner": {
        "titleA": {
            "heading": {
                "pt": "HOW TO SIGN UP",
                "en": "HOW TO SIGN UP",
                "vi": "CÁCH ĐĂNG KÝ"
            },
            "h1s1": {
                "pt": "How to post a car on Yotrip?",
                "en": "How to post a car on Yotrip?",
                "vi": "Làm cách nào để đăng xe trên Yotrip?"
            },
            "h1d1": {
                "pt": "How to post a car on Yotrip?",
                "en": "How to register a car on Yotrip is quite simple, car owners just need to access the Yotrip application or Yotrip.vn website, select the 'Personal' section, select 'My car', select 'Register a rental car' and sign up. vehicle according to instructions. In the shortest time, the Yotrip application management board will review and approve your request to register your car if the car meets all the rental conditions. Or you can fill in the form so that Yotrip Customer Care staff can contact you to advise and support you to register your car here (Registration Form) You can also see more details on how to post and manage a rental car at the link: guide for car owners (details).",
                "vi": "Cách đăng ký xe trên Yotrip khá đơn giản, chủ xe chỉ cần truy cập ứng dụng Yotrip hoặc website Yotrip.vn, chọn mục “Cá nhân”, chọn “Xe của tôi”, chọn “Đăng ký thuê xe” và đăng ký. xe theo hướng dẫn. Trong thời gian sớm nhất, ban quản lý ứng dụng Yotrip sẽ xem xét và chấp thuận yêu cầu đăng ký xe của bạn nếu xe đáp ứng đủ các điều kiện thuê xe. Hoặc bạn có thể điền thông tin vào Form để nhân viên CSKH Yotrip liên hệ tư vấn và hỗ trợ bạn đăng ký xe tại đây (Form đăng ký) Bạn cũng có thể xem thêm chi tiết cách đăng tin và quản lý thuê xe tại link: hướng dẫn cho chủ xe (chi tiết)."
            },
            "h2s1": {
                "pt": "What is the procedure for renting a car?",
                "en": "What is the procedure for renting a car?",
                "vi": "Thủ tục thuê xe như thế nào?"
            },
            "h2d1": {
                "pt": "VEHICLES",
                "en": "Car owners can set up car rental procedures at 'Personal' -> 'My car' -> 'Vehicle list' -> 'Leasing procedure' -> 'Request car rental documents' Car rental procedures include - Car rental documents: ID card, driving license: car owner compares and returns to tenant. Household registration / KT3 (long-term temporary residence book) / Original Passport: kept by the car owner Vehicle owners can verify their tenant's license at the website of the Ministry of Transport:",
                "vi": "Chủ xe có thể làm thủ tục thuê xe tại mục 'Cá nhân' -> 'Xe của tôi' -> 'Danh sách xe' -> 'Thủ tục thuê xe' -> 'Yêu cầu hồ sơ thuê xe' Thủ tục thuê xe bao gồm - Hồ sơ thuê xe: CMND, giấy phép lái xe: chủ xe đối chiếu và trả lại cho người thuê. Hộ khẩu / KT3 (sổ tạm trú dài hạn) / Hộ chiếu bản chính: do chủ xe giữ Chủ xe có thể xác minh bằng lái của người thuê tại website của Bộ GTVT:"
            },
            "h2d2": {
                "pt": "VEHICLES",
                "en": "Deposit property: Motorcycles worth >15 million (with original swing) or 15 million in cash. The car owners will hand over the car with 1. Notarized copy of car copy or Certificate of Vehicle Circulation (if the car is mortgaged by a bank), 2. Registration certificate and 3. Civil liability insurance. The owner of the car absolutely pays attention NOT to give the original car to the tenant. In addition, car owners need to be legally bound with car hirers by signing a 'self-driving car rental contract' in writing and signing a 'car handover minutes' before and after. when delivering the car (car owners can refer to the contract and minutes according to Yotrip's form, which will be sent to the car owner after successfully registering the car on Yotrip) In order to improve the safety of car rental transactions, Yotrip recommends car owners to fully carry out the process of checking documents, keeping the deposit property, and entering into a written contract 'for car rental'. rent a self-driving car' and sign the 'handover minutes' before and after handing over the car",
                "vi": "Đặt cọc tài sản: Xe máy trị giá> 15 triệu (còn nguyên bản) hoặc 15 triệu tiền mặt. Chủ xe sẽ giao xe kèm theo 1. Bản sao công chứng xe hoặc Giấy chứng nhận lưu hành xe (nếu xe đang thế chấp ngân hàng), 2. Giấy đăng ký và 3. Bảo hiểm trách nhiệm dân sự. Chủ xe lưu ý tuyệt đối KHÔNG giao xe nguyên bản cho khách thuê. Ngoài ra, chủ xe cần ràng buộc pháp lý với người thuê xe bằng việc ký 'hợp đồng thuê xe tự lái' bằng văn bản và ký 'biên bản bàn giao xe' trước sau như một. khi giao xe (chủ xe có thể tham khảo hợp đồng và biên bản theo mẫu của Yotrip sẽ gửi cho chủ xe sau khi đăng ký xe thành công trên Yotrip) Nhằm nâng cao tính an toàn trong giao dịch thuê xe, Yotrip khuyến cáo các chủ xe thực hiện đầy đủ quy trình kiểm tra hồ sơ, giữ tài sản đặt cọc, giao kết hợp đồng thuê xe ô tô bằng văn bản. thuê xe ô tô tự lái và ký 'biên bản bàn giao xe' trước và sau khi bàn giao xe"
            },
            "h3s1": {
                "pt": "Quick booking feature",
                "en": "Quick booking feature",
                "vi": "Tính năng đặt vé nhanh"
            },
            "h3d1": {
                "pt": "VEHICLES",
                "en": "Quick booking is one of the outstanding features on Yotrip. If you regularly update your bus schedule and are always sure of the rental schedule, you can adjust 'Quick booking' in the 'Vehicle Info' section to switch to automatic car browsing. Vehicles in the 'Quick Order' mode will be prioritized in the top positions and attach the 'Quick booking' label when the tenant performs a search, so they will receive more orders than the cars in manual browsing mode. However, note that in case the car owner cancels the trip (because he forgot to update the busy schedule) after the customer has made a deposit, the cancellation fee (30% of the order value) will apply. Car owners need to pay attention and make sure to update their busy schedule regularly when putting their car in 'Quick booking' mode. Car owners can set up the quick booking feature at 'Personal' -> 'My car' -> 'Vehicle list' -> 'Vehicle info' -> 'Quick booking' Car owners can customize the 'Quick Booking' mode according to the timelines: next 1 week - next 2 weeks - next 3 weeks - next 4 weeks. All car rental requests during this period will be approved for rental by default if the car is not busy scheduled, the car owner does not need to manually approve the approval on the application. In case a customer is booking a car during the period of 'Fast booking' but the car owner forgets to update the busy schedule or change the rental plan, the car owner should access the application to set a busy schedule and cancel trip in the shortest time, before customers successfully deposit.",
                "vi": "Đặt phòng nhanh chóng là một trong những tính năng nổi bật trên Yotrip. Nếu bạn thường xuyên cập nhật lịch trình xe buýt của mình và luôn chắc chắn về lịch trình thuê, bạn có thể điều chỉnh 'Đặt xe nhanh' trong phần 'Thông tin xe' để chuyển sang duyệt xe tự động. Các xe ở chế độ 'Đặt xe nhanh' sẽ được ưu tiên ở các vị trí trên cùng và gắn nhãn 'Đặt xe nhanh' khi khách thuê thực hiện tìm kiếm nên sẽ nhận được nhiều đơn hàng hơn các xe ở chế độ duyệt thủ công. Tuy nhiên, lưu ý trong trường hợp chủ xe hủy chuyến (do quên cập nhật lịch trình bận) sau khi khách hàng đã đặt cọc sẽ áp dụng phí hủy chuyến (30% giá trị đơn hàng). Các chủ xe cần lưu ý và cập nhật thường xuyên lịch trình bận rộn của mình khi đưa xe vào chế độ 'Đặt xe nhanh'. Chủ xe có thể cài đặt tính năng đặt xe nhanh tại mục 'Cá nhân' -> 'Xe của tôi' -> 'Danh sách xe' -> 'Thông tin xe' -> 'Đặt xe nhanh' Chủ xe có thể tùy chỉnh chế độ 'Đặt xe nhanh' tùy theo các mốc thời gian: 1 tuần tới - 2 tuần tới - 3 tuần tiếp theo - 4 tuần tiếp theo. Tất cả các yêu cầu thuê xe trong thời gian này sẽ được duyệt cho thuê theo mặc định nếu xe không có lịch trình bận, chủ xe không cần phải duyệt thủ công trên ứng dụng. Trường hợp khách hàng đặt xe trong thời gian 'Đặt xe nhanh' mà chủ xe quên cập nhật lịch bận hoặc thay đổi kế hoạch thuê xe, chủ xe vui lòng truy cập ứng dụng để đặt lịch bận và hủy chuyến trong thời gian sớm nhất. thời gian, trước khi khách hàng đặt cọc thành công."
            },
            "h4s1": {
                "pt": "Car Delivery feature",
                "en": "Car Delivery feature",
                "vi": "Tính năng Giao xe"
            },
            "h4d1": {
                "pt": "4.1 What is car delivery and how does it work?",
                "en": "4.1 What is car delivery and how does it work?",
                "vi": "4.1 Giao xe là gì và nó hoạt động như thế nào?"
            },
            "h4d2": {
                "pt": "VEHICLES",
                "en": "Door-to-door delivery is the second outstanding feature of Yotrip application. If you can schedule a time to deliver and pick up your car to tenants in your area, you can set up the 'Delivery to Door' feature to earn extra income and increase competition for your service. your service compared to other car owners on the app. To set up this feature, you access the Yotrip application, select 'Personal' -> 'My Car' -> 'Vehicle List' -> 'Vehicle Info', select 'Delivery' and set up the device. Set up information fields: Within: The range you can deliver the car from the location of your car (1 -> 20km) Fee: Delivery and pick-up fee (from 0 to 20,000 VND/km) Car owners with a free delivery policy will have a 'Free delivery' label below the vehicle image as well as a higher ranking priority when customers search, so they will attract and receive more orders, so car owners can consider this feature for their car.",
                "vi": "Giao hàng tận nơi là tính năng nổi bật thứ hai của ứng dụng Yotrip. Nếu bạn có thể hẹn thời gian giao và nhận xe cho khách thuê trong khu vực của mình, bạn có thể thiết lập tính năng 'Giao xe tận nơi' để kiếm thêm thu nhập và tăng tính cạnh tranh cho dịch vụ của mình. dịch vụ của bạn so với các chủ xe khác trên ứng dụng. Để thiết lập tính năng này, bạn truy cập ứng dụng Yotrip, chọn 'Cá nhân' -> 'Xe của tôi' -> 'Danh sách xe' -> 'Thông tin xe', chọn 'Giao hàng' và thiết lập thiết bị. Thiết lập các trường thông tin: Trong phạm vi: Phạm vi bạn có thể giao xe tính từ địa điểm chành xe (1 -> 20km) Phí: Phí giao và nhận xe (từ 0 - 20.000đ / km) Chủ xe có chính sách giao xe miễn phí sẽ có nhãn 'Giao hàng miễn phí' bên dưới hình ảnh xe cũng như ưu tiên xếp hạng cao hơn khi khách hàng tìm kiếm nên sẽ thu hút và nhận được nhiều đơn hàng hơn, vì vậy các chủ xe có thể cân nhắc tính năng này cho xe của mình."
            },
            "h4d3": {
                "pt": "4.2 What is the car delivery time on Yotrip?",
                "en": "4.2 What is the car delivery time on Yotrip?",
                "vi": "4.2 Thời gian giao xe trên Yotrip là bao nhiêu?"
            },
            "h4d4": {
                "pt": "Yotrip does not stipulate a specific delivery time, car owners are free to customize their policy of delivery time. The more flexible car owners are in the delivery time, the more competitive the service will be and attract customers.",
                "en": "Yotrip does not stipulate a specific delivery time, car owners are free to customize their policy of delivery time. The more flexible car owners are in the delivery time, the more competitive the service will be and attract customers.",
                "vi": "Yotrip không quy định thời gian giao hàng cụ thể, các chủ xe tự do tùy chỉnh chính sách về thời gian giao hàng. Chủ xe càng linh hoạt trong thời gian giao xe thì dịch vụ càng cạnh tranh và thu hút khách hàng."
            },
            "h5s1": {
                "pt": "Vehicle registration information",
                "en": "Vehicle registration information",
                "vi": "Thông tin đăng ký xe"
            },
            "h5d1": {
                "pt": "5.1 Can the car I bought in 2006 be posted?",
                "en": "5.1 Can the car I bought in 2006 be posted?",
                "vi": "5.1 Xe tôi mua năm 2006 có đăng được không?"
            },
            "h5d2": {
                "pt": "To ensure the safety and quality of cars for renters, Yotrip is assisting in consulting and approving vehicles manufactured from 2005 and up. The car owners ensure that their car meets all safety conditions for the tenant as well as has all legal vehicle documents (car sleeper or vehicle registration certificate (if the car is mortgaged by the bank), registration certificate. , Car insurance). In addition, car owners also need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
                "en": "To ensure the safety and quality of cars for renters, Yotrip is assisting in consulting and approving vehicles manufactured from 2005 and up. The car owners ensure that their car meets all safety conditions for the tenant as well as has all legal vehicle documents (car sleeper or vehicle registration certificate (if the car is mortgaged by the bank), registration certificate. , Car insurance). In addition, car owners also need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
                "vi": "Để đảm bảo an toàn và chất lượng xe cho khách thuê, Yotrip đang hỗ trợ tư vấn và xét duyệt các loại xe được sản xuất từ năm 2005 trở lên. Chủ xe đảm bảo xe của mình đáp ứng đầy đủ các điều kiện an toàn cho người thuê cũng như có đầy đủ giấy tờ xe hợp pháp (xe giường nằm hoặc giấy đăng ký xe (nếu xe đang thế chấp ngân hàng), giấy đăng ký, bảo hiểm xe). Ngoài ra, chủ xe cũng cần tuyệt đối đảm bảo rằng xe thuê đúng với hình ảnh và thông tin đã đăng ký trên ứng dụng Yotrip để giữ uy tín với khách hàng. Mọi trường hợp khách thuê báo cáo vi phạm về việc xe thuê không khớp với hình ảnh và thông tin đăng ký trên Yotrip, ban quản lý ứng dụng sẽ xác minh và xem xét loại bỏ đăng ký xe. ra khỏi hệ thống."
            },
            "h5d3": {
                "pt": "5.2 Can I rent out my car that I have mortgaged to a bank?",
                "en": "5.2 Can I rent out my car that I have mortgaged to a bank?",
                "vi": "5.2 Tôi có thể cho thuê lại chiếc xe mà tôi đã thế chấp cho ngân hàng không?"
            },
            "h5d4": {
                "pt": "If your car has a bank mortgage, it can still be rented on Yotrip. You just need to make sure your car meets the safety requirements for the tenant as well as has all the legal vehicle papers (car license, registration, car insurance).",
                "en": "If your car has a bank mortgage, it can still be rented on Yotrip. You just need to make sure your car meets the safety requirements for the tenant as well as has all the legal vehicle papers (car license, registration, car insurance).",
                "vi": "Nếu ô tô của bạn có thế chấp ngân hàng, nó vẫn có thể được thuê trên Yotrip. Bạn chỉ cần chắc chắn rằng chiếc xe của bạn đáp ứng các yêu cầu an toàn cho người thuê cũng như có đầy đủ giấy tờ xe hợp pháp (bằng xe, đăng ký, bảo hiểm xe)."
            },
            "h5d5": {
                "pt": "5.3 Can I get another car picture to post?",
                "en": "5.3 Can I get another car picture to post?",
                "vi": "5.3 Tôi có thể lấy hình xe khác để đăng không?"
            },
            "h5d6": {
                "pt": " You cannot get other car pictures to post on Yotrip. According to Yotrip's operating regulations, car owners need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration. out of the system.",
                "en": " You cannot get other car pictures to post on Yotrip. According to Yotrip's operating regulations, car owners need to absolutely ensure that the rental car is correct with the image and information registered on the Yotrip application to maintain credibility with customers. In all cases of violation reports from tenants about the rental car not matching the image and registration information on Yotrip, the application management will verify and consider removing the vehicle registration out of the system.",
                "vi": "Bạn không thể lấy hình ảnh xe khác để đăng trên Yotrip. Theo quy chế hoạt động của Yotrip, chủ xe cần tuyệt đối đảm bảo xe thuê đúng với hình ảnh và thông tin đã đăng ký trên ứng dụng Yotrip để giữ uy tín đối với khách hàng. Mọi trường hợp khách thuê báo cáo vi phạm về việc xe thuê không khớp với hình ảnh và thông tin đăng ký trên Yotrip, ban quản lý ứng dụng sẽ xác minh và xem xét loại bỏ đăng ký xe ra khỏi hệ thống."
            },
            "h6s1": {
                "pt": "Operating Fee",
                "en": "Operating Fee",
                "vi": "Phí điều hành"
            },
            "h6d1": {
                "pt": "6.1 Is there a fee to register a car on Yotrip?",
                "en": "6.1 Is there a fee to register a car on Yotrip?",
                "vi": "6.1 Có mất phí đăng ký ô tô trên Yotrip không?"
            },
            "h6d2": {
                "pt": "Yotrip does not charge a fee when you sign up for a car. We only charge 15% operating fee / order value (based on the price set by the car owner) when there is a transaction.",
                "en": "Yotrip does not charge a fee when you sign up for a car. We only charge 15% operating fee / order value (based on the price set by the car owner) when there is a transaction.",
                "vi": "Yotrip không thu phí khi bạn đăng ký xe. Chúng tôi chỉ thu phí vận hành 15% / giá trị đơn hàng (tính theo giá chủ xe quy định) khi có giao dịch."
            },
            "h6d3": {
                "pt": "6.2 How is the operating fee calculated?",
                "en": "6.2 How is the operating fee calculated?",
                "vi": "6.2 Phí vận hành được tính như thế nào?"
            },
            "h6d4": {
                "pt": "Operation fee is calculated at 15%/order value (based on the car owner's rental price). Operation fee is used by Yotrip to maintain the system and carry out activities to support car owners and take care of customers.",
                "en": "Operation fee is calculated at 15%/order value (based on the car owner's rental price). Operation fee is used by Yotrip to maintain the system and carry out activities to support car owners and take care of customers.",
                "vi": "Phí vận hành được tính 15% / giá trị đơn hàng (tính theo giá thuê xe của chủ xe). Phí vận hành được Yotrip sử dụng để duy trì hệ thống và thực hiện các hoạt động hỗ trợ chủ xe và chăm sóc khách hàng."
            },
            "h6d5": {
                "pt": "6.3 Promotion or discount costs, who will pay for the car owner?",
                "en": "6.3 Promotion or discount costs, who will pay for the car owner?",
                "vi": "6.3 Chi phí khuyến mãi hoặc giảm giá, ai sẽ là người chi trả cho chủ xe?"
            },
            "h6d6": {
                "pt": "Yotrip regularly conducts promotions and monthly discounts for tenants, all these costs will be charged to Yotrip. The amount of promotion and discount will be added to the e-wallet of the car owner on the Yotrip application to ensure that the car owner always collects 85% of the installed price.",
                "en": "Yotrip regularly conducts promotions and monthly discounts for tenants, all these costs will be charged to Yotrip. The amount of promotion and discount will be added to the e-wallet of the car owner on the Yotrip application to ensure that the car owner always collects 85% of the installed price.",
                "vi": "Yotrip thường xuyên thực hiện các chương trình khuyến mãi, giảm giá hàng tháng cho khách thuê, tất cả các chi phí này sẽ được tính vào Yotrip. Số tiền khuyến mãi, giảm giá sẽ được cộng vào ví điện tử của chủ xe trên ứng dụng Yotrip để đảm bảo chủ xe luôn thu 85% giá đã cài đặt."
            },
            "h6d7": {
                "pt": "6.4 What is an e-wallet? When will Yotrip settle the money? Can car owners track their revenue and withdraw money on the app?",
                "en": "6.4 What is an e-wallet? When will Yotrip settle the money? Can car owners track their revenue and withdraw money on the app?",
                "vi": "6.4 Ví điện tử là gì? Khi nào Yotrip sẽ thanh toán tiền? Chủ xe có thể theo dõi doanh thu và rút tiền của họ trên ứng dụng không?"
            },
            "h6d8": {
                "pt": "VEHICLES",
                "en": "Vehicle owners can easily track sales as well as the list of completed trips with the e-wallet feature on the Yotrip app. After the trip is completed, Yotrip will add money to the car owner's wallet and the car owner can send a withdrawal request at any time. Vehicle owners can use the e-wallet feature by accessing the Yotrip application, selecting 'Personal', selecting 'My Car', selecting 'Vehicle Owner's Wallet'. Withdrawal request will be processed within the next 3 working days if the car owner chooses the form of bank transfer, or the next 1 working day if the car owner chooses to pay via ViettelPay account.",
                "vi": "Các chủ phương tiện có thể dễ dàng theo dõi doanh số cũng như danh sách các chuyến xe đã hoàn thành với tính năng ví điện tử trên ứng dụng Yotrip. Sau khi hoàn thành chuyến đi, Yotrip sẽ cộng tiền vào ví của chủ xe và chủ xe có thể gửi yêu cầu rút tiền bất cứ lúc nào. Chủ phương tiện có thể sử dụng tính năng ví điện tử bằng cách truy cập ứng dụng Yotrip, chọn 'Cá nhân', chọn 'Xe của tôi', chọn 'Ví của chủ phương tiện'. Yêu cầu rút tiền sẽ được xử lý trong vòng 3 ngày làm việc tiếp theo nếu chủ xe chọn hình thức chuyển khoản, hoặc 1 ngày làm việc tiếp theo nếu chủ xe chọn thanh toán qua tài khoản ViettelPay."
            },
        },
        "titleB": {
            "heading": {
                "pt": "VEHICLE MANAGEMENT ON YOTRIP",
                "en": "VEHICLE MANAGEMENT ON YOTRIP",
                "vi": "QUẢN LÝ XE TRÊN YOTRIP"
            },
            "h1s1": {
                "pt": "Busy schedule management: How to adjust the bus schedule?",
                "en": "Busy schedule management: How to adjust the bus schedule?",
                "vi": "Quản lý lịch trình bận rộn: Làm thế nào để điều chỉnh lịch trình xe buýt?"
            },
            "h1d1": {
                "pt": "VEHICLES",
                "en": "Car owners can adjust the busy schedule at 'Personal' -> 'My car' -> 'Vehicle list' -> 'Vehicle schedule', select busy days and hold 1-2 seconds to switch Busy mode. · You can see more detailed instructions here",
                "vi": "Chủ xe có thể điều chỉnh lịch bận tại 'Cá nhân' -> 'Xe của tôi' -> 'Danh sách xe' -> 'Lịch xe', chọn ngày bận và giữ 1-2 giây để chuyển chế độ bận. · Bạn có thể xem thêm hướng dẫn chi tiết tại đây"
            },
            "h2s1": {
                "pt": "Browse car rental request",
                "en": "Browse car rental request",
                "vi": "Duyệt qua yêu cầu thuê xe"
            },
            "h2d1": {
                "pt": "2.1 How to know if a customer is booking a car? How to browse the car?",
                "en": "2.1 How to know if a customer is booking a car? How to browse the car?",
                "vi": "2.1 Làm sao để biết khách hàng có đặt xe hay không? Làm thế nào để duyệt xe?"
            },
            "h2d2": {
                "pt": "When there is a request to rent a car from a tenant, car owners will receive a notification through 2 forms: SMS and Notification on Yotrip application. As soon as the car rental request is received, the car owner needs to respond as soon as possible by accessing the Yotrip application, selecting the Notification item, viewing the car rental details, clicking Accept / Reject the rental. The system will give high priority to vehicles with high response rate - Fast response time - High approval rate, so car owners try to quickly and fully respond to car rental requests , as well as update the bus schedule regularly to improve the approval rate. This is one of the most important car rental experiences for car owners to be able to do business effectively on the Yotrip application. You can also see more details on the approval steps in the guide for car owners",
                "en": "When there is a request to rent a car from a tenant, car owners will receive a notification through 2 forms: SMS and Notification on Yotrip application. As soon as the car rental request is received, the car owner needs to respond as soon as possible by accessing the Yotrip application, selecting the Notification item, viewing the car rental details, clicking Accept / Reject the rental. The system will give high priority to vehicles with high response rate - Fast response time - High approval rate, so car owners try to quickly and fully respond to car rental requests , as well as update the bus schedule regularly to improve the approval rate. This is one of the most important car rental experiences for car owners to be able to do business effectively on the Yotrip application. You can also see more details on the approval steps in the guide for car owners",
                "vi": "Khi có yêu cầu thuê xe của khách thuê, các chủ xe sẽ nhận được thông báo qua 2 hình thức là SMS và Thông báo trên ứng dụng Yotrip. Ngay khi nhận được yêu cầu thuê xe, chủ xe cần phản hồi càng sớm càng tốt bằng cách truy cập ứng dụng Yotrip, chọn mục Thông báo, xem chi tiết thuê xe, nhấn Chấp nhận / Từ chối cho thuê. Hệ thống sẽ ưu tiên các xe có tỷ lệ phản hồi cao - Thời gian phản hồi nhanh - Tỷ lệ chấp thuận cao, vì vậy các chủ xe cố gắng đáp ứng nhanh và đầy đủ các yêu cầu thuê xe, cũng như cập nhật lịch trình xe thường xuyên để nâng cao tỷ lệ chấp thuận. Đây là một trong những kinh nghiệm thuê xe ô tô quan trọng nhất của các chủ xe để có thể kinh doanh hiệu quả trên ứng dụng Yotrip. Bạn cũng có thể xem thêm chi tiết về các bước phê duyệt trong hướng dẫn dành cho chủ xe"
            },
            "h2d3": {
                "pt": "2.2 How to check customer records?",
                "en": "2.2 How to check customer records?",
                "vi": "2.2 Làm thế nào để kiểm tra hồ sơ khách hàng?"
            },
            "h2d4": {
                "pt": "When there is a request to rent a car from a tenant, you can access the Yotrip application, select the Notification section, view the car rental request. At the Car rental details page, to view tenant information, click on the tenant's name to go to the Profile page, where you can see the reviews from other car owners for the tenant (in the case of a tenant). had a trip on Yotrip). You can also",
                "en": "When there is a request to rent a car from a tenant, you can access the Yotrip application, select the Notification section, view the car rental request. At the Car rental details page, to view tenant information, click on the tenant's name to go to the Profile page, where you can see the reviews from other car owners for the tenant (in the case of a tenant). had a trip on Yotrip). You can also",
                "vi": "Khi có yêu cầu thuê xe của khách thuê, bạn có thể truy cập ứng dụng Yotrip, chọn mục Thông báo, xem yêu cầu thuê xe. Tại trang Chi tiết thuê xe, để xem thông tin người thuê, bạn bấm vào tên người thuê để đến trang Hồ sơ, tại đây bạn có thể xem đánh giá của các chủ xe khác dành cho người thuê (trường hợp là khách thuê). đã có một chuyến đi trên Yotrip). Bạn cũng có thể"
            },
            "h2d5": {
                "pt": "on the approval steps in the Guide for car owners",
                "en": "on the approval steps in the Guide for car owners",
                "vi": "về các bước phê duyệt trong hướng dẫn dành cho chủ sở hữu ô tô"
            },
            "h2d6": {
                "pt": "2.3 How long do I need to respond to the customer?",
                "en": "2.3 How long do I need to respond to the customer?",
                "vi": "2.3 Tôi cần trả lời khách hàng trong bao lâu?"
            },
            "h2d7": {
                "pt": "Car owners need to respond to customers as soon as possible to increase the probability of successful order closing and increase the Response Time index (directly affecting the vehicle rating results on the application). Yotrip encourages car owners to try to respond to tenants within 15 minutes of receiving the car rental request.",
                "en": "Car owners need to respond to customers as soon as possible to increase the probability of successful order closing and increase the Response Time index (directly affecting the vehicle rating results on the application). Yotrip encourages car owners to try to respond to tenants within 15 minutes of receiving the car rental request.",
                "vi": "Các chủ xe cần phản hồi khách hàng càng sớm càng tốt để tăng xác suất chốt đơn hàng thành công và tăng chỉ số Thời gian phản hồi (ảnh hưởng trực tiếp đến kết quả đánh giá xe trên ứng dụng). Yotrip khuyến khích các chủ xe cố gắng trả lời khách thuê trong vòng 15 phút kể từ khi nhận được yêu cầu thuê xe."
            },
            "h2d8": {
                "pt": "2.4 I don't check my phone often, so browsing is slow, does Yotrip have automatic car browsing mode?",
                "en": "2.4 I don't check my phone often, so browsing is slow, does Yotrip have automatic car browsing mode?",
                "vi": "2.4 Tôi không thường xuyên kiểm tra điện thoại nên duyệt web rất chậm, Yotrip có chế độ duyệt xe tự động không?"
            },
            "h2d9": {
                "pt": "VEHICLES",
                "en": "If car owners rarely check their phones, which leads to slow response to car rental requests, car owners can switch to automatic vehicle browsing with the 'Quick Booking' feature that allows tenants to book a car without delay. need to wait for the car owner's approval. In addition, cars in automatic browsing mode will be prioritized in the top positions and attach the 'Quick booking' icon when the tenant searches for a car in the selected area, so they will receive more orders than vehicles in manual browsing mode. However, note that in case the car owner cancels the trip (because he forgot to update the busy schedule) after the customer has made a deposit, the cancellation fee (30% of the order value) will apply. Car owners need to pay close attention and make sure to update their busy schedule regularly when putting their car in 'Quick booking' mode. Car owners can customize the 'Quick Booking' mode according to the timelines: next 1 week - next 2 weeks - next 3 weeks - next 4 weeks.",
                "vi": "Nếu chủ xe ít khi kiểm tra điện thoại dẫn đến phản hồi yêu cầu thuê xe chậm, chủ xe có thể chuyển sang chế độ duyệt xe tự động với tính năng “Đặt xe nhanh” cho phép người thuê đặt xe không bị chậm trễ. cần đợi sự đồng ý của chủ xe. Ngoài ra, xe ở chế độ duyệt tự động sẽ được ưu tiên ở các vị trí trên cùng và gắn biểu tượng “Đặt xe nhanh” khi khách thuê tìm xe trong khu vực đã chọn nên sẽ nhận được nhiều đơn hàng hơn so với xe ở chế độ duyệt thủ công. Tuy nhiên, lưu ý trong trường hợp chủ xe hủy chuyến (do quên cập nhật lịch trình bận) sau khi khách hàng đã đặt cọc sẽ áp dụng phí hủy chuyến (30% giá trị đơn hàng). Các chủ xe cần hết sức lưu ý và đảm bảo cập nhật lịch trình bận rộn thường xuyên khi đưa xe vào chế độ “Đặt xe nhanh”. Chủ xe có thể tùy chỉnh chế độ “Đặt xe nhanh” theo các mốc thời gian: 1 tuần tới - 2 tuần tiếp theo - 3 tuần tiếp theo - 4 tuần tiếp theo."
            },
            "h2d10": {
                "pt": "2.5 My car is busy and not rented, do I need feedback or approval?",
                "en": "2.5 My car is busy and not rented, do I need feedback or approval?",
                "vi": "2.5 Xe của tôi đang bận và không thuê được, tôi có cần phản hồi hoặc chấp thuận không?"
            },
            "h2d11": {
                "pt": "In case the car is busy, the owner still needs to give feedback to the tenant by clicking Refuse to rent (select the reason for the busy car) at the Trip information page. If car owners do not respond to car rental requests, it will reduce the response rate, thereby directly affecting the car rating results on the application, reducing the probability of receiving orders and reducing business efficiency. . Yotrip recommends that the best solution is that car owners need to regularly update their busy schedule on the application.",
                "en": "In case the car is busy, the owner still needs to give feedback to the tenant by clicking Refuse to rent (select the reason for the busy car) at the Trip information page. If car owners do not respond to car rental requests, it will reduce the response rate, thereby directly affecting the car rating results on the application, reducing the probability of receiving orders and reducing business efficiency. . Yotrip recommends that the best solution is that car owners need to regularly update their busy schedule on the application.",
                "vi": "Trong trường hợp xe bận, chủ xe vẫn cần phản hồi cho khách thuê bằng cách bấm Từ chối cho thuê (chọn lý do xe bận) tại trang Thông tin chuyến đi. Nếu chủ xe không phản hồi yêu cầu thuê xe sẽ làm giảm tỷ lệ phản hồi, từ đó ảnh hưởng trực tiếp đến kết quả đánh giá xe trên ứng dụng, giảm xác suất nhận được đơn hàng, giảm hiệu quả kinh doanh. . Yotrip khuyến nghị giải pháp tốt nhất là các chủ xe cần cập nhật thường xuyên lịch trình bận rộn của mình trên ứng dụng."
            },
            "h2d12": {
                "pt": "2.6 After I approve the rental agreement, is the car booking transaction completed?",
                "en": "2.6 After I approve the rental agreement, is the car booking transaction completed?",
                "vi": "2.6 Sau khi tôi phê duyệt hợp đồng thuê xe, giao dịch đặt xe đã hoàn tất chưa?"
            },
            "h2d13": {
                "pt": "After the car owner approves the rental agreement, the tenant will make a deposit through the Yotrip system. Since the tenant can change the rental plan after the car owner agrees, only when the tenant has successfully deposited a deposit, the car booking transaction will be completed. At this time, the car owner and tenant will receive each other's phone numbers to contact to confirm the schedule, delivery location and required documents.",
                "en": "After the car owner approves the rental agreement, the tenant will make a deposit through the Yotrip system. Since the tenant can change the rental plan after the car owner agrees, only when the tenant has successfully deposited a deposit, the car booking transaction will be completed. At this time, the car owner and tenant will receive each other's phone numbers to contact to confirm the schedule, delivery location and required documents.",
                "vi": "Sau khi chủ xe chấp thuận hợp đồng thuê xe, người thuê sẽ tiến hành đặt cọc thông qua hệ thống Yotrip. Do người thuê có thể thay đổi phương án thuê xe sau khi chủ xe đồng ý nên chỉ khi người thuê đặt cọc thành công thì giao dịch đặt xe mới hoàn tất. Lúc này, chủ xe và người thuê sẽ nhận được số điện thoại của nhau để liên hệ xác nhận lịch trình, địa điểm giao xe và các giấy tờ cần thiết."
            },
            "h2d14": {
                "pt": "2.7 What do I need to do after a customer makes a successful deposit?",
                "en": "2.7 What do I need to do after a customer makes a successful deposit?",
                "vi": "2.7 Tôi cần làm gì sau khi khách hàng nạp tiền thành công?"
            },
            "h2d15": {
                "pt": "After the tenant successfully deposits the car, the car owner and the tenant will receive each other's phone number information. Vehicle owners need to actively contact the tenant within 1 hour from the time of deposit to reconfirm the schedule, delivery location and required documents. In case there is a change in the rental plan or cannot agree with the tenant on the required procedures, the car owner needs to cancel the trip on the system, all cancellations within 1 hour will not charged.",
                "en": "After the tenant successfully deposits the car, the car owner and the tenant will receive each other's phone number information. Vehicle owners need to actively contact the tenant within 1 hour from the time of deposit to reconfirm the schedule, delivery location and required documents. In case there is a change in the rental plan or cannot agree with the tenant on the required procedures, the car owner needs to cancel the trip on the system, all cancellations within 1 hour will not charged.",
                "vi": "Sau khi người thuê đặt cọc xe thành công, chủ xe và người thuê sẽ nhận được thông tin số điện thoại của nhau. Chủ phương tiện cần chủ động liên hệ với bên thuê trong vòng 1 giờ kể từ khi đặt cọc để xác nhận lại lịch trình, địa điểm giao xe và các giấy tờ cần thiết. Trường hợp có sự thay đổi kế hoạch thuê xe hoặc không thống nhất được với khách thuê các thủ tục theo quy định, chủ xe có nhu cầu hủy chuyến trên hệ thống, tất cả các trường hợp hủy chuyến trong vòng 1 giờ sẽ không bị tính phí."
            },
            "h2d16": {
                "pt": "2.8 I have agreed to the rental, but the customer has not yet paid a deposit, during that time I have to request to rent a car outside the Yotrip system, what should I do?",
                "en": "2.8 I have agreed to the rental, but the customer has not yet paid a deposit, during that time I have to request to rent a car outside the Yotrip system, what should I do?",
                "vi": "2.8 Tôi đã đồng ý thuê xe nhưng khách hàng chưa đặt cọc, trong thời gian đó tôi có yêu cầu thuê xe ngoài hệ thống Yotrip thì tôi phải làm thế nào?"
            },
            "h2d17": {
                "pt": "You can receive external orders and cancel flights on the Yotrip system. The car owner only needs to make sure the cancellation time occurs before the customer successfully deposits. In case the car owner cancels the trip after the tenant successfully makes a deposit, the cancellation policy in the Operation Regulations will apply.",
                "en": "You can receive external orders and cancel flights on the Yotrip system. The car owner only needs to make sure the cancellation time occurs before the customer successfully deposits. In case the car owner cancels the trip after the tenant successfully makes a deposit, the cancellation policy in the Operation Regulations will apply.",
                "vi": "Bạn có thể nhận đơn đặt hàng bên ngoài và hủy chuyến bay trên hệ thống Yotrip. Chủ xe chỉ cần đảm bảo thời gian hủy xe trước khi khách hàng đặt cọc thành công. Trong trường hợp chủ xe hủy chuyến sau khi khách thuê đặt cọc thành công, chính sách hủy chuyến trong Quy chế hoạt động sẽ được áp dụng."
            },
            "h2d18": {
                "pt": "2.9 I have agreed to the rental, but the customer still has not made a deposit, during that time I received other car rental requests on Yotrip for the same time period 668 / 5.000 Kết quả dịch can i get it or not?",
                "en": "2.9 I have agreed to the rental, but the customer still has not made a deposit, during that time I received other car rental requests on Yotrip for the same time period 668 / 5.000 Kết quả dịch can i get it or not?",
                "vi": "2.9 Tôi đã đồng ý thuê xe, nhưng khách hàng vẫn chưa đặt cọc, trong thời gian đó tôi đã nhận được các yêu cầu thuê xe khác trên Yotrip trong cùng khoảng thời gian 668 / 5.000 Kết quả dịch tôi có nhận được hay không?"
            },
            "h2d19": {
                "pt": "Yotrip system allows a car owner to receive and agree to lease at the same time for one or more orders for the same rental period on Yotrip application. If any order is successfully deposited, the remaining orders will be automatically canceled.",
                "en": "Yotrip system allows a car owner to receive and agree to lease at the same time for one or more orders for the same rental period on Yotrip application. If any order is successfully deposited, the remaining orders will be automatically canceled.",
                "vi": "Hệ thống Yotrip cho phép chủ xe nhận và đồng ý cho thuê cùng lúc một hoặc nhiều đơn hàng trong cùng thời gian thuê trên ứng dụng Yotrip. Nếu bất kỳ đơn hàng nào được đặt cọc thành công, các đơn hàng còn lại sẽ tự động bị hủy."
            },
            "h2d20": {
                "pt": "2.10 Can the tenant and the person signing the contract be two different people?",
                "en": "2.10 Can the tenant and the person signing the contract be two different people?",
                "vi": "2.10 Người thuê và người ký hợp đồng có thể là hai người khác nhau không?"
            },
            "h2d17": {
                "pt": "The case of booking for a loved one on the application is still available and valid. The car owner should note that the person signing the car rental contract will leave the original document (Household or KT3 or Passport) and have his or her name in that document, compare the information on this document with the ID/CCCD, the driver. A valid driving license is required according to the regulations of the Ministry of Transport.",
                "en": "The case of booking for a loved one on the application is still available and valid. The car owner should note that the person signing the car rental contract will leave the original document (Household or KT3 or Passport) and have his or her name in that document, compare the information on this document with the ID/CCCD, the driver. A valid driving license is required according to the regulations of the Ministry of Transport.VEHICLES",
                "vi": "Các trường hợp đặt vé cho người thân trên ứng dụng vẫn được và hợp lệ. Chủ xe lưu ý người ký hợp đồng thuê xe để lại giấy tờ gốc (Hộ khẩu hoặc KT3 hoặc Hộ chiếu) và có tên của mình trong giấy tờ đó, đối chiếu thông tin trên giấy tờ này với CMND / CCCD, người lái xe. Cần có giấy phép lái xe hợp lệ theo quy định của Bộ Giao thông vận tải."
            },
            "h3s1": {
                "pt": "Vehicle deposit payment",
                "en": "Vehicle deposit payment",
                "vi": "Thanh toán tiền gửi xe"
            },
            "h3d1": {
                "pt": "What is the payment process on Yotrip? As soon as the trip ends, Yotrip will add the remaining money to the wallet for the car owner. In case the trip is canceled and the car owner receives a deposit, within the next two working days, Yotrip will add it to the e-wallet. After submitting a withdrawal request, Yotrip will transfer the money to the car owner within the next 3 working days.",
                "en": "What is the payment process on Yotrip? As soon as the trip ends, Yotrip will add the remaining money to the wallet for the car owner. In case the trip is canceled and the car owner receives a deposit, within the next two working days, Yotrip will add it to the e-wallet. After submitting a withdrawal request, Yotrip will transfer the money to the car owner within the next 3 working days.",
                "vi": "Quy trình thanh toán trên Yotrip là gì? Ngay sau khi chuyến đi kết thúc, Yotrip sẽ cộng số tiền còn lại vào ví cho chủ xe. Trong trường hợp chuyến đi bị hủy và chủ xe nhận được tiền đặt cọc, trong vòng hai ngày làm việc tiếp theo, Yotrip sẽ cộng vào ví điện tử. Sau khi gửi yêu cầu rút tiền, Yotrip sẽ chuyển tiền cho chủ xe trong vòng 3 ngày làm việc tiếp theo."
            },
            "h4s1": {
                "pt": "Withdraw money via Yotrip wallet",
                "en": "Withdraw money via Yotrip wallet",
                "vi": "Rút tiền qua ví Yotrip"
            },
            "h4d1": {
                "pt": "How can I track my wallet balance and make withdrawals? Vehicle owners can check the balance in the e-wallet by opening the application, selecting 'Personal' -> 'My Car' -> 'Vehicle Owner's Wallet'. To withdraw money, in the 'My wallet' section, the owner of the vehicle pulls down to the bottom of the screen, selects 'Send withdrawal request', chooses one of two methods 'Bank transfer' or 'Viettel Pay' then enter the following information: information related to the receiving account that the application asks for. Finally click 'Send request'. Note: With the withdrawal method 'Viettel Pay', car owners need to verify their Viettel Pay account before submitting a withdrawal request.",
                "en": "How can I track my wallet balance and make withdrawals? Vehicle owners can check the balance in the e-wallet by opening the application, selecting 'Personal' -> 'My Car' -> 'Vehicle Owner's Wallet'. To withdraw money, in the 'My wallet' section, the owner of the vehicle pulls down to the bottom of the screen, selects 'Send withdrawal request', chooses one of two methods 'Bank transfer' or 'Viettel Pay' then enter the following information: information related to the receiving account that the application asks for. Finally click 'Send request'. Note: With the withdrawal method 'Viettel Pay', car owners need to verify their Viettel Pay account before submitting a withdrawal request.",
                "vi": "Làm cách nào để theo dõi số dư trong ví của tôi và thực hiện rút tiền? Chủ phương tiện có thể kiểm tra số dư trong ví điện tử bằng cách mở ứng dụng, chọn 'Cá nhân' -> 'Xe của tôi' -> 'Ví của chủ xe'. Để rút tiền, tại mục 'Ví của tôi', chủ phương tiện kéo xuống cuối màn hình, chọn 'Gửi yêu cầu rút tiền', chọn một trong hai phương thức 'Chuyển khoản' hoặc 'Viettel Pay' rồi nhập thông tin sau: thông tin liên quan đến tài khoản nhận mà ứng dụng yêu cầu. Cuối cùng nhấp vào 'Gửi yêu cầu'. Lưu ý: Với hình thức rút tiền 'Viettel Pay', chủ xe cần xác thực tài khoản Viettel Pay trước khi gửi yêu cầu rút tiền."
            },
        },
        "titleC": {
            "heading": {
                "pt": " VEHICLE DELIVERY AND RECEIVED",
                "en": " VEHICLE DELIVERY AND RECEIVED",
                "vi": " GIAO XE VÀ NHẬN HÀNG"
            },
            "h1s1": {
                "pt": "Papers, car rental procedures",
                "en": "Papers, car rental procedures",
                "vi": "Giấy tờ, thủ tục thuê xe"
            },
            "h1d1": {
                "pt": "1.1 Do I need to sign a contract or legal document for renting a self-driving car?",
                "en": "1.1 Do I need to sign a contract or legal document for renting a self-driving car?",
                "vi": "1.1 Thuê xe ô tô tự lái có cần ký hợp đồng hay văn bản pháp lý không?"
            },
            "h1d2": {
                "pt": "In order to increase the level of security for car rental transactions, Yotrip recommends that car owners need to be legally binding with car hirers by entering into a written contract 'Autonomous car rental contract'. ' and sign the 'Delivery Minutes' before and after handing over the vehicle. Vehicle owners can use the contract form of their unit or can refer to the contract form and the handover minutes of Yotrip.",
                "en": "In order to increase the level of security for car rental transactions, Yotrip recommends that car owners need to be legally binding with car hirers by entering into a written contract 'Autonomous car rental contract'. ' and sign the 'Delivery Minutes' before and after handing over the vehicle. Vehicle owners can use the contract form of their unit or can refer to the contract form and the handover minutes of Yotrip.",
                "vi": "Để tăng mức độ bảo mật cho các giao dịch thuê xe, Yotrip khuyến nghị chủ xe cần ràng buộc pháp lý với người thuê xe bằng cách giao kết hợp đồng bằng văn bản 'Hợp đồng thuê xe tự chủ'. 'và ký' Biên bản bàn giao xe 'trước và sau khi bàn giao xe. Các chủ phương tiện có thể sử dụng mẫu hợp đồng của đơn vị mình hoặc có thể tham khảo mẫu hợp đồng và biên bản bàn giao xe của Yotrip."
            },
            "h1d3": {
                "pt": "1.2 Does Yotrip have a car rental contract template?",
                "en": "1.2 Does Yotrip have a car rental contract template?",
                "vi": "1.2 Yotrip có mẫu hợp đồng thuê xe không?"
            },
            "h1d4": {
                "pt": "Car owners can refer to the self-driving car rental contract and Yotrip's Car Handover Minute (have received a lawyer's consultation on the legality of the contract). The Contract Form and Handover Minute will be emailed by Yotrip's Partner Development department after the car owner's rental registration is approved by the Yotrip Application Management Board.",
                "en": "Car owners can refer to the self-driving car rental contract and Yotrip's Car Handover Minute (have received a lawyer's consultation on the legality of the contract). The Contract Form and Handover Minute will be emailed by Yotrip's Partner Development department after the car owner's rental registration is approved by the Yotrip Application Management Board.",
                "vi": "Các chủ xe có thể tham khảo Hợp đồng thuê xe tự lái và Biên bản bàn giao xe của Yotrip (đã nhận được sự tư vấn của luật sư về tính pháp lý của hợp đồng). Mẫu Hợp đồng và Biên bản Bàn giao sẽ được bộ phận Phát triển Đối tác của Yotrip gửi qua email sau khi đăng ký thuê xe của chủ xe được Ban Quản lý Ứng dụng Yotrip phê duyệt."
            },
            "h2s1": {
                "pt": "Evaluation after the trip",
                "en": "Evaluation after the trip",
                "vi": "Đánh giá sau chuyến đi"
            },
            "h2d1": {
                "pt": "Can I send reviews and comments to tenants after the trip? Vehicle owners can directly send reviews (from 1-5 *) and comments to tenants via Yotrip application after the tenant completes the trip.",
                "en": "Can I send reviews and comments to tenants after the trip? Vehicle owners can directly send reviews (from 1-5 *) and comments to tenants via Yotrip application after the tenant completes the trip.",
                "vi": "Tôi có thể gửi đánh giá và nhận xét cho người thuê sau chuyến đi không? Chủ phương tiện có thể trực tiếp gửi đánh giá (từ 1-5 *) và nhận xét cho người thuê qua ứng dụng Yotrip sau khi người thuê hoàn thành chuyến đi."
            },
            "h3s1": {
                "pt": "Withdraw money via Yotrip wallet",
                "en": "Withdraw money via Yotrip wallet",
                "vi": "Rút tiền qua ví Yotrip"
            },
            "h3d1": {
                "pt": "How can I track my wallet balance and make withdrawals? Vehicle owners can check the balance in the e-wallet by opening the application, selecting 'Personal' -> 'My Car' -> 'Vehicle Owner's Wallet'. To withdraw money, in the 'My wallet' section, the owner of the vehicle pulls down to the bottom of the screen, selects 'Send withdrawal request', chooses one of two methods 'Bank transfer' or 'Viettel Pay' then enter the following information: information related to the receiving account that the application asks for. Finally click 'Send request'. Note: With the withdrawal method 'Viettel Pay', car owners need to verify their Viettel Pay account before submitting a withdrawal request.",
                "en": "How can I track my wallet balance and make withdrawals? Vehicle owners can check the balance in the e-wallet by opening the application, selecting 'Personal' -> 'My Car' -> 'Vehicle Owner's Wallet'. To withdraw money, in the 'My wallet' section, the owner of the vehicle pulls down to the bottom of the screen, selects 'Send withdrawal request', chooses one of two methods 'Bank transfer' or 'Viettel Pay' then enter the following information: information related to the receiving account that the application asks for. Finally click 'Send request'. Note: With the withdrawal method 'Viettel Pay', car owners need to verify their Viettel Pay account before submitting a withdrawal request.",
                "vi": "Làm cách nào để theo dõi số dư trong ví của tôi và thực hiện rút tiền? Chủ phương tiện có thể kiểm tra số dư trong ví điện tử bằng cách mở ứng dụng, chọn 'Cá nhân' -> 'Xe của tôi' -> 'Ví của chủ xe'. Để rút tiền, tại mục 'Ví của tôi', chủ phương tiện kéo xuống cuối màn hình, chọn 'Gửi yêu cầu rút tiền', chọn một trong hai phương thức 'Chuyển khoản' hoặc 'Viettel Pay' rồi nhập thông tin sau: thông tin liên quan đến tài khoản nhận mà ứng dụng yêu cầu. Cuối cùng nhấp vào 'Gửi yêu cầu'. Lưu ý: Với hình thức rút tiền 'Viettel Pay', chủ xe cần xác thực tài khoản Viettel Pay trước khi gửi yêu cầu rút tiền."
            },
            "h1d3": {
                "pt": "VEHICLES",
                "en": "VEHICLES",
                "vi": "PHƯƠNG"
            },
        },
        "titleD": {
            "pt": "VEHICLES",
            "en": "VEHICLES",
            "vi": "PHƯƠNG"
        },
        "titleE": {
            "pt": "VEHICLES",
            "en": "VEHICLES",
            "vi": "PHƯƠNG"
        },
        "titleF": {
            "pt": "VEHICLES",
            "en": "VEHICLES",
            "vi": "PHƯƠNG"
        },
    }
};