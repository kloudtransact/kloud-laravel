function(t) {
        function e() {
            var t = Date.parse(o) - Date.parse(new Date),
                e = Math.floor(t / 1e3 % 60),
                i = Math.floor(t / 1e3 / 60 % 60),
                s = Math.floor(t / 36e5 % 24),
                n = Math.floor(t / 864e5);
            return {
                total: t,
                days: n,
                hours: s,
                minutes: i,
                seconds: e
            }
        }

        function i() {
            var t = e();
            r.innerHTML = t.days, a.innerHTML = ("0" + t.hours).slice(-2), l.innerHTML = ("0" + t.minutes).slice(-2), h.innerHTML = ("0" + t.seconds).slice(-2)
        }

        function s() {
            clearInterval(p);
        }
        var n = document.getElementById(t);
        if (n) {
            var o = "April 2 2019 23:59:00 GMT+0200",
                r = n.querySelector(".days"),
                a = n.querySelector(".hours"),
                l = n.querySelector(".minutes"),
                h = n.querySelector(".seconds"),
                c = (new Date).getTime(),
                u = new Date(2019, 1, 1, 3, 0, 0).getTime(),
                d = new Date(o).getTime();
            if (!(c > u && d > c) || e().total <= 0) return void s();
            var p = setInterval(i, 1e3);
            i();
        }
    }("clockdiv");