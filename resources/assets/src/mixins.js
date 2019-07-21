var mixin = {
    methods: {
        getSubRace(key = null){
            let name = this.$store.state.char.subrace;
            if(!name){ return false; }
            let count = Object.keys(this.$store.state.data.subraces).length;
            for(let i = 1; i <= count; i++){
                let subrace = this.$store.state.data.subraces[i];
                
                if(subrace.name == name){
                    if(key !== null){
                        return subrace[key];
                    }else{
                        return subrace;
                    }
                }
            }

            return false;
        },
        getRace(key = null){
            let name = this.$store.state.char.race;

            let count = Object.keys(this.$store.state.data.races).length;
            for(let i = 1; i <= count; i++){
                let race = this.$store.state.data.races[i];
                
                if(race.name == name){
                    if(key !== null){
                        return race[key];
                    }else{
                        return race;
                    }
                }
            }

            return false;
        },
        bonus(key, type = "", source = ""){
            let bonusAmt = 0;
            this.$store.state.char.bonuses.forEach(function(bonus){
                if(type !== "" && bonus.type != type){
                    return;
                }
                if(source !== "" && bonus.source !== source){
                    return;
                }
                if(bonus.key !== key){
                    return;
                }

                bonusAmt += parseInt(bonus.val);
            });

            return bonusAmt;
        },
        getMod(val){
            switch(val){
                case 1:
                    return -5;
                    break;
                case 2:
                    return -4;
                    break;
                case 3:
                    return -4;
                    break;
                case 4:
                    return -3;
                    break;
                case 5:
                    return -3;
                    break;
                case 6:
                    return -2;
                    break;
                case 7:
                    return -2;
                    break;
                case 8:
                    return -1;
                    break;
                case 9:
                    return -1;
                    break;
                case 10:
                    return 0;
                    break;
                case 11:
                    return 0;
                    break;
                case 12:
                    return 1;
                    break;
                case 13:
                    return 1;
                    break;
                case 14:
                    return 2;
                    break;
                case 15:
                    return 2;
                    break;
                case 16:
                    return 3;
                    break;
                case 17:
                    return 3;
                    break;
                case 18:
                    return 4;
                    break;
                case 19:
                    return 4;
                    break;
                case 20:
                    return 5;
                    break;
                case 21:
                    return 5;
                    break;
                case 22:
                    return 6;
                    break;
                case 23:
                    return 6;
                    break;
                case 24:
                    return 7;
                    break;
                case 25:
                    return 7;
                    break;
                case 26:
                    return 8;
                    break;
                case 27:
                    return 8;
                    break;
                case 28:
                    return 9;
                    break;
                case 29:
                    return 9;
                    break;
                case 30:
                    return 10;
                    break;
            }
        }
    }
}

export {mixin};