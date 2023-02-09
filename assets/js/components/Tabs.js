export default function Tabs(firstTab) {
    return {
        tabToShow: firstTab,
        showTab($el, tab) {
            this.tabToShow = tab;
        }
    }
}