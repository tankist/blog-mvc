<!doctype html>
<html lang="en">
<head>
    <title>{% block title %}{{ title|default('MVC Blog demo') }}{% endblock %}</title>
    {% block head %}
        <meta charset="UTF-8">
    {% endblock %}
    {% block headAssets %}
        {% if not (assets is empty) %}{{ assets.outputCss('head') }}{{ assets.outputJs('head') }}{% endif %}
    {% endblock %}
</head>
<body>
{% block content %}{{ content() }}{% endblock %}
{% block footerAssets %}
    {% if not (assets is empty) %}{{ assets.outputCss('footer') }}{{ assets.outputJs('footer') }}{% endif %}
{% endblock %}
</body>
</html>