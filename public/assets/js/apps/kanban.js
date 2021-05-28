"use strict";

!function (NioApp, $) {
  "use strict"; // Variable

  var $win = $(window),
      $body = $('body'),
      breaks = NioApp.Break;

  NioApp.Kanban = function () {
    function titletemplate(title, count) {
      var optionicon = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : "more-h";
      return "\n                <div class=\"kanban-title-content\">\n                    <h6 class=\"title\">".concat(title, "</h6>\n                    <span class=\"badge badge-pill badge-outline-light text-dark\">").concat(count, "</span>\n                </div>\n                <div class=\"kanban-title-content\">\n                    <div class=\"drodown\">\n                        <a href=\"#\" class=\"dropdown-toggle btn btn-sm btn-icon btn-trigger mr-n1\" data-toggle=\"dropdown\"><em class=\"icon ni ni-").concat(optionicon, "\"></em></a>\n                        <div class=\"dropdown-menu dropdown-menu-right\">\n                            <ul class=\"link-list-opt no-bdr\">\n                                <li><a href=\"#\"><em class=\"icon ni ni-edit\"></em><span>Edit Board</span></a></li>\n                                <li><a href=\"#\"><em class=\"icon ni ni-plus-sm\"></em><span>Add Task</span></a></li>\n                                <li><a href=\"#\"><em class=\"icon ni ni-plus-sm\"></em><span>Add Option</span></a></li>\n                            </ul>\n                        </div>\n                    </div>\n                </div>\n            ");
    }

    var kanban = new jKanban({
      element: '#kanban',
      gutter: '0',
      widthBoard: '320px',
      responsivePercentage: false,
      boards: [{
        'id': '_open',
        'title': titletemplate("Open", "3"),
        'class': 'kanban-light',
        'item': [{
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Dashlite Design Kit Update</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-primary\"><span>A</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-primary\">\n                                                        <span>AB</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Abu Bin Ishtiyak</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Update the new UI design for @dashlite template with based on feedback.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-info\">Dashlite</span></li>\n                                <li><span class=\"badge badge-warning\">UI Design</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li class=\"text-danger\"><em class=\"icon ni ni-calendar\"></em><span>2d Due</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Design</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>1</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>4</span></li>\n                                </ul>\n                            </div>\n                        "
        }, {
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Implement Design into Template</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-dark\"><span>S</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-dark\">\n                                                        <span>SD</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Sara Dervishi</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Start implementing new design in Coding @dashlite.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-info\">Dashlite</span></li>\n                                <li><span class=\"badge badge-danger\">HTML</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-calendar\"></em><span>15 Dec 2020</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Forntend</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-comments\"></em><span>2</span></li>\n                                </ul>\n                            </div>\n                        "
        }, {
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Dashlite React Version</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-blue\"><span>C</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-blue\">\n                                                        <span>CJ</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Cooper Jones</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Implement new UI design in react version @dashlite template as soon as possible.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-info\">Dashlite</span></li>\n                                <li><span class=\"badge badge-secondary\">React</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-calendar\"></em><span>5d Due</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Forntend</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>3</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>5</span></li>\n                                </ul>\n                            </div>\n                        "
        }]
      }, {
        'id': '_in_progress',
        'title': titletemplate("In Progress", "4"),
        'class': 'kanban-primary',
        'item': [{
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Techyspec Keyword Research</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-danger\"><span>V</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-danger\">\n                                                        <span>VL</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Victoria Lynch</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Keyword recarch for @techyspec business profile and there other websites, to improve ranking.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-dark\">Techyspec</span></li>\n                                <li><span class=\"badge badge-success\">SEO</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-calendar\"></em><span>02 Jan 2021</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Recharch</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>31</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>21</span></li>\n                                </ul>\n                            </div>\n                        "
        }, {
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Fitness Next Website Design</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-pink\"><span>P</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-pink\">\n                                                        <span>PN</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Patrick Newman</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Design a awesome website for @fitness_next new product launch.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-primary\">Fitness Next</span></li>\n                                <li><span class=\"badge badge-warning\">UI Design</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-calendar\"></em><span>8d Due</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Design</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>3</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>5</span></li>\n                                </ul>\n                            </div>\n                        "
        }, {
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Runnergy Website Redesign</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-purple\">\n                                                <span>J</span>\n                                            </div>\n                                            <div class=\"user-avatar xs bg-success\">\n                                                <span>I</span>\n                                            </div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-purple\">\n                                                        <span>JH</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Jane Harris</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-success\">\n                                                        <span>IH</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Iliash Hosain</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Redesign there old/backdated website new modern and clean look keeping minilisim in mind.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-gray\">Redesign</span></li>\n                                <li><span class=\"badge badge-primary\">Runnergy</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-calendar\"></em><span>10 Jan 2021</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Design</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>12</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>8</span></li>\n                                </ul>\n                            </div>\n                        "
        }, {
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Wordlab Android App</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-primary\"><span>J</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-primary\">\n                                                        <span>JH</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Jane Harris</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Wordlab Android App with with react native.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-success\">Wordlab</span></li>\n                                <li><span class=\"badge badge-light\">Android</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-calendar\"></em><span>21 Jan 2021</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>App</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>8</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>85</span></li>\n                                </ul>\n                            </div>\n                        "
        }]
      }, {
        'id': '_to_review',
        'title': titletemplate("To Review", "2"),
        'class': 'kanban-warning',
        'item': [{
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">Oberlo Development</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-purple\">\n                                                <span>A</span>\n                                            </div>\n                                            <div class=\"user-avatar xs bg-success\">\n                                                <span>B</span>\n                                            </div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-primary\">\n                                                        <span>AB</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Abu Bin Ishtiyak</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-success\">\n                                                        <span>BA</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Butler Alan</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Complete website development for Oberlo limited.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-info\">Oberlo</span></li>\n                                <li><span class=\"badge badge-danger\">Development</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li class=\"text-danger\"><em class=\"icon ni ni-calendar\"></em><span>1d Due</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Backend</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>16</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>25</span></li>\n                                </ul>\n                            </div>\n                        "
        }, {
          'title': "\n                            <div class=\"kanban-item-title\">\n                                <h6 class=\"title\">IOS app for Getsocio</h6>\n                                <div class=\"drodown\">\n                                    <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\">\n                                        <div class=\"user-avatar-group\">\n                                            <div class=\"user-avatar xs bg-pink\"><span>P</span></div>\n                                        </div>\n                                    </a>\n                                    <div class=\"dropdown-menu dropdown-menu-right\">\n                                        <ul class=\"link-list-opt no-bdr p-3 g-2\">\n                                            <li>\n                                                <div class=\"user-card\">\n                                                    <div class=\"user-avatar sm bg-pink\">\n                                                        <span>PN</span>\n                                                    </div>\n                                                    <div class=\"user-name\">\n                                                        <span class=\"tb-lead\">Patrick Newman</span>\n                                                    </div>\n                                                </div>\n                                            </li>\n                                        </ul>\n                                    </div>\n                                </div>\n                            </div>\n                            <div class=\"kanban-item-text\">\n                                <p>Design and develop app for Getsocio IOS.</p>\n                            </div>\n                            <ul class=\"kanban-item-tags\">\n                                <li><span class=\"badge badge-dark\">Getsocio</span></li>\n                                <li><span class=\"badge badge-light\">IOS</span></li>\n                            </ul>\n                            <div class=\"kanban-item-meta\">\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li class=\"text-danger\"><em class=\"icon ni ni-calendar\"></em><span>4d Due</span></li>\n                                    <li><em class=\"icon ni ni-notes\"></em><span>Forntend</span></li>\n                                </ul>\n                                <ul class=\"kanban-item-meta-list\">\n                                    <li><em class=\"icon ni ni-clip\"></em><span>3</span></li>\n                                    <li><em class=\"icon ni ni-comments\"></em><span>5</span></li>\n                                </ul>\n                            </div>\n                        "
        }]
      }, {
        'id': '_completed',
        'title': titletemplate("Completed", "0"),
        'class': 'kanban-success',
        'item': []
      }]
    });

    for (var i = 0; i < kanban.options.boards.length; i++) {
      var board = kanban.findBoard(kanban.options.boards[i].id);
      $(board).find("footer").html("<button class=\"kanban-add-task btn btn-block\"><em class=\"icon ni ni-plus-sm\"></em><span>Add another task</span></button>");
    }
  };

  NioApp.coms.docReady.push(NioApp.Kanban);
}(NioApp, jQuery);