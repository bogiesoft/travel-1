<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <?php
                $model = \common\models\Userdata::findOne(['user_id' => Yii::$app->user->id]);
                $image = $model->getImage();
                if ($image) {
                    $avatar = $image->getUrl('160x160');
                } else {
                    $avatar = $directoryAsset."/img/user2-160x160.jpg";
                } ?>
                <img src="<?= $avatar ?>" class="img-circle" alt="User Image"/>
            </div>
            <div class="pull-left info">
                <p><?=$model->firstname || $model->lastname ? $model->firstname.' '.$model->lastname : 'Admin User'?></p>

                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu'],
                'items' => [
                    ['label' => 'Меню', 'options' => ['class' => 'header']],

                    /*['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii']],
                    ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug']],*/

                    ['label' => 'Войти', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],

                    [
                        'label' => 'Туры',
                        'icon' => 'fa fa-globe',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/tours'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/tours/create'],],
                            [
                                'label' => 'Категории',
                                'icon' => 'fa fa-tags',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/tour-category'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/tour-category/create'],],
                                ]
                            ],
                            [
                                'label' => 'Отели',
                                'icon' => 'fa fa-bed',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/hotels'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/hotels/create'],],
                                ]
                            ],

                            [
                                'label' => 'Типы полей',
                                'icon' => 'fa fa-font',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/field-type'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/field-type/create'],],
                                ]
                            ],
                        ]
                    ],

                    [
                        'label' => 'Мероприятия',
                        'icon' => 'fa fa-group',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/events'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/events/create'],],
                            [
                                'label' => 'Категории',
                                'icon' => 'fa fa-tags',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/event-category'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/event-category/create'],],
                                ]
                            ],
                        ]
                    ],

                    [
                        'label' => 'Веб-камеры',
                        'icon' => 'fa fa-video-camera',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/webcam'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/webcam/create'],],
                        ]
                    ],

                    [
                        'label' => 'Новости',
                        'icon' => 'fa fa-newspaper-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/news'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/news/create'],],
                        ]
                    ],

                    [
                        'label' => 'Текстовые страницы',
                        'icon' => 'fa fa-file-text-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/pages'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/pages/create'],],
                        ]
                    ],

                    [
                        'label' => 'Отзывы',
                        'icon' => 'fa fa-paragraph',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/reviews'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/reviews/create'],],
                        ]
                    ],

                    [
                        'label' => 'Локализация',
                        'icon' => 'fa fa-compass',
                        'url' => '#',
                        'items' => [
                            [
                                'label' => 'Страны',
                                'icon' => 'fa fa-map-marker',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/countries'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/countries/create'],],
                                ]
                            ],
                            [
                                'label' => 'Города',
                                'icon' => 'fa fa-map-marker',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/cities'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/cities/create'],],
                                ]
                            ],
                            [
                                'label' => 'Маркеры на карте',
                                'icon' => 'fa fa-map-marker',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/markers'],],
                                    ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/markers/create'],],
                                ]
                            ],
                        ]
                    ],

                    [
                        'label' => 'Рекламные баннеры',
                        'icon' => 'fa fa-picture-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/adv'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/adv/create'],],
                        ]
                    ],

                    [
                        'label' => 'Советы',
                        'icon' => 'fa fa-hand-pointer-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/advices'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/advices/create'],],
                        ]
                    ],

                    [
                        'label' => 'Слайдер',
                        'icon' => 'fa fa-picture-o',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Список', 'icon' => 'fa fa-list', 'url' => ['/slider'],],
                            ['label' => 'Добавить', 'icon' => 'fa fa-plus', 'url' => ['/slider/create'],],
                        ]
                    ],

                    [
                        'label' => 'Пользователи',
                        'icon' => 'fa fa-user',
                        'url' => ['/user/list']
                    ],

                    [
                        'label' => 'Настройки',
                        'icon' => 'fa fa-cog',
                        'url' => ['/options']
                    ],

                    /*[
                        'label' => 'Same tools',
                        'icon' => 'fa fa-share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'fa fa-file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'fa fa-dashboard', 'url' => ['/debug'],],
                            [
                                'label' => 'Level One',
                                'icon' => 'fa fa-circle-o',
                                'url' => '#',
                                'items' => [
                                    ['label' => 'Level Two', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                    [
                                        'label' => 'Level Two',
                                        'icon' => 'fa fa-circle-o',
                                        'url' => '#',
                                        'items' => [
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                            ['label' => 'Level Three', 'icon' => 'fa fa-circle-o', 'url' => '#',],
                                        ],
                                    ],
                                ],
                            ],
                        ],
                    ],*/

                    [
                        'label' => 'Выйти из системы',
                        'icon' => 'fa fa-sign-out',
                        'url' => ['site/logout'], 'visible' => !Yii::$app->user->isGuest
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
