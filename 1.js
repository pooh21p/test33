
    function toggle_item(cid)
    {
        let elements = document . querySelectorAll('ul.ul_tree > li.c' + cid);
        for (let elem of elements) {
            elem . classList . add("open");
        }
    }

    function show_description(cid)
    {
        let element = document . getElementById('cd' + cid);
        document . getElementById('description') . innerHTML = element . innerHTML;
    }
