<?php
    /**
     * This block will be executed if you have NO wp-config-local.php and you
     * are NOT running on Pantheon. Insert alternate config here if necessary.
     *
     * If you are only running on Pantheon, you can ignore this block.
     */
    define('DB_NAME',          'rp3agency');
    define('DB_USER',          'root');
    define('DB_PASSWORD',      'password');
    define('DB_HOST',          'localhost');
    define('DB_CHARSET',       'utf8');
    define('DB_COLLATE',       '');
    define('AUTH_KEY',         '[+-9Wzuyo_e_&8.cN8B|Zrd/VU`ss&|U$ozv&igt_idN(ddz&w)k!cY3[KZvXk*B');
    define('SECURE_AUTH_KEY',  '`KM#=|C|+Rrjf?<$3^RX/InK*:4.U->u t2XOa-@qfx~p@a@{:4Y]xtf|LBx;m76');
    define('LOGGED_IN_KEY',    'SyhA>j]uobIE:H9hnzZ8aIpf6Xox67Y3!;u~Uwz,ym-oaTEk}D~brg:Z3rvaP{i#');
    define('NONCE_KEY',        'jyxQ-iWabigQs+Haxu_3bKG1cDx,04!yR2^T4s/1j7?2WrqnI$3{FyUQ{M-s;EY(');
    define('AUTH_SALT',        '!09YN6I6@3/p;VJ-h+H4P^&!xzxuxBn,*y#uo-9rTWOqB$j4e]La}juBn:{i$@,|');
    define('SECURE_AUTH_SALT', 'qb(1Y`9fKC#&0NGy$+@`JCwT-Uxg[k^lnR/m(X@2wyW?FU0O3^+oj1iDBX7hH{~J');
    define('LOGGED_IN_SALT',   'OVShJ&>%F9]RW5sAVNV+:|%vp`t:1`Amz_I^] Z-{aft[e$j;J.fPT2{{QPJ|#8?');
    define('NONCE_SALT',       'PQ71pfXU7([E-H|6eP95NL~0)N-!S9D}u;uY:_jYzz5uU0s~tId6fV@!a.(QoWA;');

    define( 'WP_CONTENT_DIR', dirname( __FILE__ ) . '/wp-content' );
    define( 'WP_CONTENT_URL', 'http://' . $_SERVER['HTTP_HOST'] . '/wp-content' );
