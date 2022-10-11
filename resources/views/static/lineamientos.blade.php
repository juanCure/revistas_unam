@extends('layouts.app')
@section('content')
	<div class="container-fluid" id="main_container">
    	<div class="row" id="results_cards">
    		@include('public_sidebar')
            <div class="col-lg-9 order-1 order-lg-2 data_col" id="subsistemas_col" style="background: #ffffff;border-top-right-radius: 10px;">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#"><span>Inicio</span></a></li>
                    <li class="breadcrumb-item"><a href="#"><span>LINEAMIENTOS<br></span></a></li>
                </ol>
                <div class="row page_row" id="article_results_container_row">
                    <div class="col-12 article_col">
                        <h2 id="heading_static_page">DIRECTRICES GENERALES PARA LA EDICIÓN Y PUBLICACIÓN&nbsp;<br>DE REVISTAS ACADÉMICAS DIGITALES EN LA UNAM<br></h2>
                        <p>Las presentes Directrices Generales para la Edición y Publicación de Revistas Académicas en la UNAM tienen como objetivo señalar los criterios que toda revista académica digital editada y publicada en soporte digital bajo el sello de la Universidad Nacional Autónoma de México debe cumplir.&nbsp;<br></p>
                        <p>Las presentes Directrices Generales para la Edición y Publicación de Revistas Académicas Digitales en la UNAM se emiten en apego a las Disposiciones Generales para la Actividad Editorial y de Distribución de la Universidad Nacional Autónoma de México emanadas del Consejo Editorial de la UNAM (Gaceta UNAM del 3 de septiembre de 2018), máximo órgano colegiado en materia editorial, así como a lo dispuesto en el Acuerdo por el que se Modifican la Estructura y Funciones del Consejo de Publicaciones Académicas y Arbitradas y se Adicionan Funciones a la Red de Directores y Editores de Revistas Académicas y Arbitradas en la UNAM (Gaceta UNAM del 1 de agosto de 2016).<br></p>
                        <p>En razón de lo anterior, el Consejo de Publicaciones Académicas y Arbitradas de la UNAM acordó emitir las siguientes Directrices Generales para la Edición y Publicación de Revistas Académicas Digitales en la UNAM:<br></p>
                        <ol class="lineamientos_list">
                            <li>
                                <div>
                                    <p>GENERALIDADES</p>
                                </div>
                                <ol>
                                    <li>Con la finalidad de lograr identidad institucional en las revistas académicas digitales de la UNAM, fortaecer y consolidar su desarrollo y elevar su calidad editorial, las entidades académicas y dependencias universitarias que editen este tipo de publicaciones deberán atender a lo dispuesto en estas Directrices.</li>
                                    <li>&nbsp;En el mismo sentido, este documento busca promover entre los equipos editoriales responsables de la edición y publicación de revistas académicas digitales en la UNAM la adopción de buenas prácticas editoriales y el uso de estándares internacionales que ayuden a lograr una mayor visibilidad, presencia e impacto de las revistas de forma institucional. </li>
                                    <li>Para efectos de estas Directrices se entenderá por:<ol type="i">
                                            <li>ENTIDADES ACADÉMICAS Y DEPENDENCIAS UNIVERSITARIAS: Las facultades, escuelas, institutos, centros, secretarías, coordinaciones, direcciones generales y programas que editen y publiquen revistas académicas digitales por sí mismas o en colaboración con otras entidades académicas o dependencias, tanto universitarias como externas.</li>
                                            <li>REVISTAS ACADÉMICAS DIGITALES: Publicaciones periódicas difundidas en línea (vía red de cómputo) con carácter científico, técnico-profesional, cultural o de divulgación editadas y publicadas por las entidades universitarias, cuya lectura requiere de una computadora o de un dispositivo de lectura digital, y que cuentan con un sitio web bajo el dominio unam.mx. Este tipo de publicaciones puede contener diferentes formatos de publicación, material audiovisual, interactivo y galerías fotográficas, entre otros.</li>
                                            <li>COMITÉ EDITORIAL DE LA ENTIDAD UNIVERSITARIA. Es el órgano colegiado de una entidad académica o dependencia universitaria editora que establece y regula los procedimientos para registro, dictamen, selección, edición, impresión, difusión, promoción, almacenamiento, preservación, distribución, comercialización, canje y donación de sus publicaciones, en particular libros y revistas.</li>
                                            <li>EQUIPO EDITORIAL DE LA REVISTA. El equipo editorial de la revista académica digital está conformado por los nombramientos que de manera enunciativa, mas no limitativa ni estricta, se mencionan a continuación:<ol type="a">
                                                    <li>
                                                        <div>
                                                            <p>EDITOR RESPONSABLE</p>
                                                            <p>Es el responsable y representante de la revista (comúnmente llamado director o editor en jefe), quien tendrá como parte de sus funciones convocar y coordinar las actividades de los comités editorial y científico, así como la participación de los editores técnicos y asociados.</p>
                                                            <p>Define la línea editorial de la revista con base en los objetivos planteados, el público objetivo, las líneas de investigación y las tendencias del entorno. Deberá promocionarla y difundirla ampliamente, ser un vínculo entre las autoridades y el equipo editorial, proponer y fomentar la participación de autores y árbitros, proponer la estrategia para mejorar la calidad de los procesos editoriales, los contenidos de la revista, su alcance e impacto.</p>
                                                            <p>El editor responsable, preferentemente deberá ser un especialista destacado en el área del conocimiento de la revista, quedando excluido de ocupar este nombramiento el titular en turno de la dependencia universitaria editora, así como otros directivos o funcionarios de primer nivel.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>EDITOR TÉCNICO</p>
                                                            <p>El editor técnico es el responsable de dar cauce a las líneas de acción y estrategias propuestas por el editor responsable, así como coordinar las actividades del equipo técnico editorial de la revista académica digital en lo que respecta a sus procesos editoriales.</p>
                                                            <p>El editor técnico deberá evaluar en primera instancia la pertinencia de los manuscritos que se reciban en la revista académica digital y establecer la comunicación con autores y árbitros.</p>
                                                            <p>El editor técnico deberá ser el responsable de indexar la revista académica digital en los diferentes servicios de información correspondientes al área del conocimiento de la misma.</p>
                                                            <p>El editor técnico deberá ser un profesional de la edición que cuente con experiencia en procesos editoriales de corte académico.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>ASISTENTE EDITORIAL</p>
                                                            <p>El asistente editorial será el técnico que apoye en el desarrollo de los procesos editoriales de la revista académica digital.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>EDITORES ASOCIADOS</p>
                                                            <p>Los editores asociados de la revista académica digital serán los responsables de gestionar números o secciones específicas de la revista, ya sea de forma permanente o mediante invitación del editor responsable.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>COMITÉ EDITORIAL</p>
                                                            <p>El comité editorial en coordinación con el editor responsable definirá las líneas de acción de la revista digital, velará por el cumplimiento de los objetivos y alcance de la misma y vigilará que los artículos recibidos cumplan con las normas y políticas editoriales de la revista.</p>
                                                            <p>En coordinación con el editor responsable y el editor técnico, evaluará en primera instancia la pertinencia de los manuscritos que se reciban en la revista académica digital.</p>
                                                            <p>Los miembros del comité editorial de la revista académica digital, preferentemente deberán ser especialistas destacados en el área del conocimiento de la revista y deberán apoyar en su difusión y promoción.</p>
                                                            <p>Para las revistas académicas digitales de corte científico o técnico-profesional, al menos dos terceras partes de sus integrantes deben ser ajenos a la institución que edita la revista.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>COMITÉ CIENTÍFICO O CONSULTIVO</p>
                                                            <p>El comité científico o consultivo generalmente se conforma para las revistas académicas digitales de corte científico o técnico-profesional y tiene entre sus funciones evaluar permanentemente la calidad de los contenidos de la revista.</p>
                                                            <p>Los miembros del comité científico o consultivo de la revista, deberán ser investigadores y especialistas de alto prestigio nacional e internacional y deberán apoyar en la difusión y promoción de la revista.</p>
                                                            <p>Para este comité al menos dos terceras partes de sus integrantes deben ser ajenos a la institución que edita la revista.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>&nbsp;EQUIPO TÉCNICO EDITORIAL</p>
                                                            <p>El equipo técnico de la revista académica digital estará integrado por los correctores de estilo, diseñadores, maquetadores, formadores y técnicos de lenguajes de marcado, quienes generarán los diversos formatos digitales de publicación de la revista.</p>
                                                        </div>
                                                    </li>
                                                    <li>
                                                        <div>
                                                            <p>SOPORTE TÉCNICO</p>
                                                            <p>Será imprescindible contar con el apoyo de algún área de soporte técnico que garantice el correcto funcionamiento y actualización de las tecnologías e infraestructura que se utilicen para la edición y publicación de la revista académica digital. </p>
                                                            <p>Este soporte preferentemente deberá ser otorgado por la entidad universitaria que edita la revista académica digital. Sin embargo, en caso de requerirlo, la entidad universitaria podrá solicitar a la Subdirección de Revistas Académicas y Publicaciones Digitales de la Dirección General de Publicaciones y Fomento Editora (DGPFE) dicho soporte. </p>
                                                        </div>
                                                    </li>
                                                </ol>
                                            </li>
                                            <li>
                                                <div>
                                                    <p>DOI INSTITUCIONAL: Se refiere a los identificadores de objetos digitales (DOI, por las siglas en inglés de Digital Object Identifier) con el prefijo 10.22201, el cual ha sido asignado por la agencia Crossref a la UNAM para la generación de los DOI institucionales de las revistas académicas digitales editadas y publicadas con el sello universitario.</p>
                                                    <p>Para la asignación y registro de los DOI institucionales, las entidades académicas deberán solicitar el servicio a la Subdirección de Revistas Académicas y Publicaciones Digitales de la DGPFE.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <p>SERVICIOS DE INFORMACIÓN DIGITALES: Se entiende como aquellos servicios que se originan a partir de un sistema en línea que cuenta con una base de datos estructurada que ofrece información organizada como índices, directorios, catálogos, resúmenes, hemerotecas, entre otros.</p>
                                                </div>
                                            </li>
                                            <li>
                                                <div>
                                                    <p>REGALÍAS: Remuneración a los autores generada por el uso o explotación de sus obras intelectuales.</p>
                                                </div>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>Estas Directrices Generales son de observancia obligatoria en la UNAM y su vigilancia corresponde al Consejo de Publicaciones Académicas y Arbitradas de la UNAM.</li>
                                </ol>
                            </li>
                            <li>
                                <div>
                                    <p>FUNCIONES DE LAS DIRECCIONES GENERALES DE ASUNTOS JURÍDICOS, PUBLICACIONES Y FOMENTO EDITORIAL Y PATRIMONIO UNIVERSITARIO</p>
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <p>La Dirección General de Asuntos Jurídicos (DGAJ) tiene las funciones siguientes: </p>
                                        </div>
                                        <ol type="i">
                                            <li>Obtener la protección jurídica a favor de la Universidad respecto de las obras que se produzcan;</li>
                                            <li>Tramitar ante el Centro Nacional del ISSN el Número Internacional Normalizado para Publicaciones Periódicas (ISSN, por las siglas en inglés de International Standard Serial Number) para las revistas académicas digitales y llevar el control de su asignación;</li>
                                            <li>Tramitar ante el Instituto Nacional del Derecho de Autor (INDAUTOR) el dictamen previo y la obtención de la reserva de derechos al uso exclusivo de títulos para las revistas académicas digitales, así como su renovación anual;</li>
                                            <li>Gestionar el registro legal de los instrumentos contractuales que en materia editorial celebre la UNAM ante el INDAUTOR; </li>
                                            <li>Elaborar, revisar y, en su caso, actualizar los formatos de instrumentos jurídicos conforme a la normativa aplicable en materia editorial, a los cuales deberán sujetarse las entidades universitarias, de acuerdo con los cambios que se vayan produciendo en razón de los avances de la tecnología, en la edición universitaria, en los nuevos modelos de negocio, tendencias globales y en la industria en general; </li>
                                            <li>Recibir en depósito y otorgar el número de registro interno de los instrumentos contractuales que en materia editorial hayan sido suscritos por las entidades universitarias; </li>
                                            <li>A petición de las entidades universitarias, podrá efectuar la revisión y análisis jurídico de los proyectos de los instrumentos consensuales, tomando en consideración lo previsto en la Legislación Universitaria, respecto de las facultades de suscripción que tienen los titulares de las entidades académicas y dependencias universitarias en materia editorial y autoral, así como las obligaciones y excepciones previstas respecto de la validación jurídica de los mismos; </li>
                                            <li>Llevar el control del Registro Universitario de la Propiedad Intelectual; </li>
                                            <li>Dictaminar sobre la procedencia del pago de regalías a los autores y editores, de conformidad con el porcentaje que al efecto fijen la Legislación Universitaria, las Disposiciones Generales y los contratos correspondientes; </li>
                                            <li>Asesorar a las entidades académicas y dependencias universitarias editoras que así lo soliciten en lo relativo a la celebración de convenios, contratos, cartas de autorización de publicación y cesión de derechos, así como en los demás actos de los procesos de edición y de distribución que impliquen consecuencias jurídicas, y </li>
                                            <li>Las demás que le confieran las presentes Directrices Generales o la persona titular de la Rectoría. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>A la Dirección General de Publicaciones y Fomento Editorial le corresponde:</p>
                                            <ol type="i">
                                                <li>Fortalecer y consolidar el desarrollo de las revistas académicas digitales de la UNAM a través de la articulación de las iniciativas y estrategias institucionales que emanen del Consejo de Publicaciones Académicas y Arbitradas en la UNAM, y de la Red de Directores y Editores de Revistas Académicas y Arbitradas;</li>
                                                <li>Colaborar con las diversas entidades universitarias en el desarrollo de proyectos institucionales para la mejora permanente de las revistas académicas digitales, a fin de lograr que éstas tengan una mayor difusión, visibilidad e impacto en el ámbito internacional;</li>
                                                <li>Gestionar, mantener y actualizar continuamente el Portal de Revistas de la UNAM (<a href="www.revistas.unam.mx" target="_blank">www.revistas.unam.mx</a>) en el que se pueda consultar en línea: a) el catálogo de revistas académicas de la UNAM de acuerdo con su naturaleza; b) los contenidos a texto completo de las revistas académicas de la UNAM, y c) información de interés para la Red de Directores y Editores de Revistas Académicas de la UNAM y público en general.</li>
                                                <li>Coordinar acciones con la Dirección General de Repositorios Institucionales de la UNAM y con las entidades universitarias para asegurar la incorporación de las revistas universitarias y sus contenidos en el Repositorio Institucional de la UNAM a través del Portal de Revistas de la UNAM.</li>
                                                <li>Asesorar y ofrecer capacitación continua a los equipos editoriales de las revistas académicas sobre la aplicación de las presentes Directrices Generales, la adopción de buenas prácticas editoriales, el uso y aprovechamiento de tecnologías, aplicación de estándares internacionales y la inclusión de las revistas académicas digitales en servicios de información nacionales e internacionales.</li>
                                                <li>Proveer herramientas tecnológicas que optimicen los procesos editoriales y aumenten la visibilidad, penetración e impacto de las revistas académicas digitales de forma global. </li>
                                                <li>Ofrecer apoyo técnico especializado para la publicación en línea de las revistas académicas digitales de la UNAM.</li>
                                                <li>Promover continuamente las revistas académicas digitales y el catálogo que conforman en diversos foros y eventos, tanto nacionales como internacionales, así como fomentar acuerdos de vinculación y colaboración interinstitucionales que permitan el mayor posicionamiento posible. </li>
                                                <li>Tramitar y administrar la membresía anual del DOI institucional para asignación y registro de las revistas y sus contenidos, y para que éstos sean identificados como ediciones de la UNAM. Asimismo, proporcionar la asesoría técnica y velar por su uso y aprovechamiento.</li>
                                                <li>Gestionar los recursos que la Universidad asigne para la contratación y administración de herramientas tecnológicas de apoyo en la detección del plagio en las ediciones universitarias;</li>
                                                <li>Facilitar los canales de comunicación entre las revistas académicas digitales de la UNAM y los diferentes servicios de indización y gestión de revistas; y</li>
                                                <li>Velar por el cumplimiento de las presentes Directrices Generales.</li>
                                            </ol>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <p>La Dirección General del Patrimonio Universitario tendrá a su cargo el resguardo de los certificados de los derechos de autor originales correspondientes a la UNAM, así como los certificados de las reservas de derechos de las difusiones periódicas.</p>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <div>
                                    <p>ATRIBUCIONES DE LAS ENTIDADES UNIVERSITARIAS</p>
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <p>Los titulares de las entidades académicas y dependencias universitarias editoras serán responsables de aplicar las presentes Directrices Generales.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Las entidades académicas y dependencias universitarias editoras deberán:</p>
                                            <ol type="i">
                                                <li>Apegarse a lo establecido en la Ley Federal del Derecho de Autor (LFDA), así como a los lineamientos y políticas del Instituto Nacional del Derecho de Autor, y a la Legislación Universitaria.</li>
                                                <li>Aprobar, por conducto del comité editorial de la entidad universitaria, o a través del consejo técnico o interno, cuando sea el caso, la creación de nuevas revistas académicas digitales;</li>
                                                <li>Conformar los equipos editoriales de las revistas académicas digitales de acuerdo con su estructura organizacional y los presupuestos de operación con los que cuente;</li>
                                                <li>Velar por la debida protección de derechos de autor en favor de la UNAM para evitar perjuicios;</li>
                                                <li>Realizar ante la DGAJ los trámites correspondientes para la asignación de ISSN, búsqueda de antecedentes registrales, dictámenes previos, reserva de derechos al uso exclusivo del título y su renovación anual;</li>
                                                <li>Solicitar las gestiones necesarias a la DGAJ sobre los cambios que procedan en relación con la revista académica digital.</li>
                                                <li>Mantener actualizado el registro catalográfico de la revista académica digital en el Portal de Revistas de la UNAM (<a href="www.revistas.unam.mx" target="_blank">www.revistas.unam.mx</a>).</li>
                                                <li>Confirmar el registro de cada número publicado en los catálogos y bases de datos especializados del Sistema Bibliotecario de la UNAM: el catálogo SERIUNAM y las bases de datos CLASE y PERIÓDICA, según corresponda.</li>
                                                <li>Mantener actualizados los registros catalográficos de la revista académica digital en todos aquellos servicios de información externos a la UNAM donde se encuentre incluida. </li>
                                                <li>Atender las recomendaciones de la DGPFE sobre la adopción de estándares, normas, políticas, metodologías y buenas prácticas institucionales para la mejora continua de la producción, digitalización, almacenamiento, catalogación, gestión, difusión, consulta, comercialización, preservación digital y derechos de autor de las revistas académicas digitales;</li>
                                                <li>Colaborar con la DGPFE en el desarrollo de iniciativas institucionales que busquen mejorar la difusión, visibilidad e impacto internacional de las revistas académicas digitales.</li>
                                            </ol>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <div>
                                    <p>DEFINICIÓN DE LAS REVISTAS ACADÉMICAS DIGITALES</p>
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <p>Tipo de revista. Las revistas académicas digitales de la UNAM podrán tipificarse de la siguiente manera:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Revista de investigación científica. Son revistas que publican trabajos originales e inéditos de investigación, ya sea de tipo empírico o teórico. Están dirigidas al público especializado en la disciplina científica que cada revista aborda.</li>
                                            <li>Revista técnico-profesional. Se trata de revistas que publican artículos cuyo objetivo es solucionar problemas prácticos, contribuir al avance tecnológico y comunicar nuevos aportes en su área de conocimiento. Están dirigidas a profesionales, técnicos, docentes, estudiantes de posgrado e investigadores interesados en conocer los avances técnicos o profesionales en sus propias disciplinas.</li>
                                            <li>Revista de divulgación científica. Son aquellas revistas de corte académico cuyos contenidos son escritos con lenguajes accesibles que aprovechan al máximo los recursos narrativos, literarios y gramaticales propios del periodismo generalista y del periodismo de investigación. Están dirigidas a un público no especializado, pero interesado en contenidos científicos. </li>
                                            <li>Revistas culturales y literarias. Estas revistas publican contenidos sobre las diversas expresiones artísticas, así como temas de interés socio-cultural. Están dirigidas al público en general.</li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Tipo de arbitraje. Para buscar una mayor calidad en los contenidos de las revistas académicas digitales deberán aplicar alguno de los sistemas de arbitraje (también conocido como dictaminación) descritos a continuación:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Simple ciego. El árbitro conoce la identidad del autor, pero no a la inversa. Generalmente se solicitan dos revisiones y en caso de haber diferencia de opiniones, se solicitará una tercera opinión.</li>
                                            <li>Doble ciego. Tanto el árbitro como el autor desconocen sus identidades. Al igual que en el caso anterior generalmente se solicitan dos revisiones y en caso de haber diferencia de opiniones, se solicitará una tercera opinión.</li>
                                            <li>Abierto. Tanto los árbitros como los autores conocen sus identidades. En este tipo de arbitraje, se permite publicar las opiniones y con ello generar posteriores discusiones. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Tipo de difusión. Las revistas académicas digitales de la UNAM podrán ser difundidas en alguno de los siguientes modelos:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Comercial. Para consultar los contenidos de la revista académica digital, el lector deberá pagar una cuota económica, ya sea por la compra o suscripción.</li>
                                            <li>Acceso Abierto. Los contenidos de la revista se&nbsp;difunden y publican en línea de forma libre, gratuita y sin restricciones para cualquier lector. Generalmente las revistas editadas bajo este modelo declaran su adhesión a la iniciativa internacional de Acceso Abierto.</li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <div>
                                    <p>DIRECTRICES GENERALES</p>
                                    <p>Para la edición, difusión y publicación de las revistas académicas digitales, las entidades universitarias se guiarán por los siguientes lineamientos.</p>
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <p>De la identidad institucional de las revistas académicas digitales</p>
                                        </div>
                                        <ol type="i">
                                            <li>La revista académica digital deberá contar con un sitio web bajo el dominio unam.mx. En caso de que se requiera el uso de algún otro dominio, deberá ser utilizado como un alias del dominio institucional.</li>
                                            <li>Preferentemente el dominio deberá referir al título reservado de la revista académica digital, de tal forma que pueda identificarse y recordarse fácilmente.</li>
                                            <li>En el cabezal (head) del sitio web de la revista académica digital, se deberá presentar el título de la revista tal como haya sido otorgado por el INDAUTOR en la Reserva de Derechos al Uso Exclusivo del Título, atendiendo a los lineamientos que para ello solicita el INDAUTOR. </li>
                                            <li>Se deberá incorporar el escudo de la UNAM, preferentemente del lado izquierdo del cabezal (head) del sitio web, y deberá ser un vínculo hacia el portal institucional www.unam.mx, cuidando cumplir con los lineamientos de INDAUTOR en lo referente a los trámites de Reserva de Derechos al Uso Exclusivo del Título.</li>
                                            <li>Se deberán incorporar los logotipos de las dependencias universitarias editoras y coeditoras en el cabezal de la revista.</li>
                                            <li>Se deberá incorporar el cintillo legal de la revista académica digital en el pie del sitio web (footer) de acuerdo a lo requerido por la oficina de la DGAJ de la UNAM, preferentemente con los siguientes datos: Título, año y número. Periodicidad. Domicilio de la UNAM. Nombre, domicilio, teléfono de la Entidad Académica o Dependencia Universitaria que la genera, dirección electrónica en dónde se alberga la revista (enlace), correo electrónico de la revista. Nombre del editor responsable, número del certificado o de la Reserva de Derechos al Uso Exclusivo del Título, ISSN (se podrá poner la leyenda “En trámite” cuando esté en proceso de otorgamiento ante el INDAUTOR). Nombre y domicilio del Responsable de la última actualización (puede ser el Editor Técnico). Fecha de la última actualización de la revista. La leyenda de deslinde y permisibilidad (ejemplo: “El contenido de los artículos es responsabilidad de los autores y no refleja el punto de vista de los árbitros, del editor o de la UNAM. Se autoriza la reproducción total o parcial de los textos así publicados siempre y cuando se cite la fuente completa y la dirección electrónica de la publicación”).</li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Del uso del dígito ISSN</p>
                                        </div>
                                        <ol type="i">
                                            <li>Previo a la solicitud de asignación del dígito ISSN, las revistas académicas digitales deberán solicitar el Certificado de la Reserva de Derechos al Uso Exclusivo del Título.</li>
                                            <li>El dígito ISSN deberá solicitarse con el mismo título que el otorgado en la Certificado de la Reserva de Derechos al Uso Exclusivo del Título de la revista académica digital.</li>
                                            <li>Se deberá solicitar un ISSN por cada tipo de soporte en el que se difunda la revista, es decir, si la misma revista se publica en formato impreso y también se difunde vía red de cómputo se deberá tramitar una reserva de derechos al uso exclusivo del título y un ISSN para cada una de ellas. </li>
                                            <li>El dígito ISSN preferentemente deberá aparecer en el ángulo superior derecho del cabezal (head) del sitio web donde se aloja la revista académica digital. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Del uso del DOI institucional</p>
                                        </div>
                                        <ol type="i">
                                            <li>Las revistas académicas digitales deberán contar con un DOI institucional que identifique a la UNAM como la institución editora y deberá incorporarlo en un lugar visible de la página inicial del sitio web.</li>
                                            <li>A su vez, los fascículos y artículos de la revista deberán contar con un DOI institucional cada uno.</li>
                                            <li>Se deberá velar por el correcto llenado de metadatos para el registro del DOI en Crossref, así como realizar las actualizaciones correspondientes cuando haya cambios, particularmente en lo referente a los URL asociados a cada artículo. </li>
                                            <li>El prefijo del DOI institucional que identifica a la UNAM es el 10.22201, el cual deberá ser solicitado a la DGPFE, dependencia encargada de su gestión y pago ante la agencia de Crossref. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>De la Reserva al Derecho Exclusivo </p>
                                        </div>
                                        <ol type="i">
                                            <li>Las revistas académicas digitales deberán contar con la Reserva al Derecho Exclusivo del Título para cada uno de los soportes en los que se edite.</li>
                                            <li>Anualmente, las entidades universitarias deberán tramitar la renovación de la Reserva al Derecho Exclusivo del Título ante la DGAJ, dentro del plazo comprendido desde un mes antes y hasta un mes posterior al día del vencimiento de la misma.<br>Para ello, deberá cumplir con los lineamientos de INDAUTOR en lo referente a este trámite, realizando una comprobación fehaciente del uso y explotación del título reservado.</li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>De su presencia en sistemas de información</p>
                                        </div>
                                        <ol type="i">
                                            <li>El equipo editorial deberá mantener actualizada la información catalográfica de la revista académica digital en el Portal de Revistas UNAM (<a href="www.revistas.unam.mx" target="_blank">www.revistas.unam.mx</a>) a través del correo electrónico <br><a href="mailto:revistas@unam.mx"> revistas@unam.mx</a>.</li>
                                            <li>El equipo editorial deberá mantener actualizada la información catalográfica en los sistemas de información donde la revista esté indexada. Para ello deberán ponerse en contacto con los administradores de cada uno de los sistemas.</li>
                                            <li>El equipo editorial deberá buscar la incorporación de la revista académica digital en todos aquellos sistemas de información (índices y bases de datos) relacionados con el área del conocimiento de la publicación. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Del equipo editorial</p>
                                        </div>
                                        <ol type="i">
                                            <li>Los responsables editoriales (editor responsable, editor técnico y editores asociados), su afiliación institucional y datos de contacto.</li>
                                            <li>El cuerpo editorial (asistente editorial, equipo técnico y soporte técnico), su afiliación institucional y datos de contacto.</li>
                                            <li>Los miembros del comité editorial, su afiliación institucional, país y registro ORCID. </li>
                                            <li>Los miembros del comité científico, su afiliación institucional, país y registro ORCID. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>De las políticas editoriales <br>Dentro del sitio web de la revista académica digital se deberán publicar los siguientes elementos:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Descripción, objetivo y alcance. Se deberán describir y abordar aspectos como:<ul>
                                                    <li>el tipo de revista de que se trata</li>
                                                    <li>el público al que va dirigida</li>
                                                    <li>el público al que va dirigida</li>
                                                    <li>periodicidad</li>
                                                    <li>el tipo de arbitraje que aplica</li>
                                                    <li>los soportes en los que se publica </li>
                                                    <li>el modelo de publicación</li>
                                                    <li>el año de inicio tanto de la versión impresa (si existió previamente y únicamente como referencia histórica) como de la digital.</li>
                                                </ul>
                                            </li>
                                            <li>Declaración de normas éticas y malas prácticas. Se recomienda consultar la página del COPE (Committee on Publication Ethics) y tomar como referencia la documentación disponible en <a href="www.publicaciones.unam.mx" target="_blank">www.publicaciones.unam.mx</a>.</li>
                                            <li>Declaración de política para la detección del plagio. Describir qué herramientas y procedimientos aplican para la detección del plagio. Los editores responsables podrán solicitar a la DGPFE una cuenta institucional para el uso de herramientas tecnológicas de apoyo para la detección de plagio disponibles en el momento. </li>
                                            <li>Declaración de política de Acceso Abierto. Cuando la revista se edite y publique de forma libre y gratuita se deberá declarar que la publicación se realiza en apego las iniciativas institucionales, nacionales e internacionales de Acceso Abierto (Open Access). </li>
                                            <li>Declaración y cumplimiento de la periodicidad. Se deberá mencionar la periodicidad con la que se edita y publica la revista y los equipos editoriales deberán velar para que se cumpla permanentemente. Asimismo, cada fascículo deberá mostrar su numeración, la cual se recomienda esté compuesta por: volumen, número, periodo (meses) y año. El cumplimiento de la periodicidad implica publicar preferentemente al inicio del periodo según la frecuencia declarada por la revista. </li>
                                            <li>Declaración de las normas editoriales. Las revistas deberán declarar y explicar con detalle las secciones de la revista, su definición, alcance y público al que va dirigido, los tiempos de dictaminación y respuesta, entre otra información relevante.<br>Deberán mencionar de forma clara y fácilmente localizable en el sitio web las instrucciones para los autores, indicando los formatos en que se deben presentar los materiales, por qué medio deberán enviarse, el estilo en que deberá presentarse el aparato crítico (citas, referencias, cuadros, tablas).<br>Las normas para la elaboración de citas y referencias bibliográficas, son parte de las instrucciones para los autores en las que se les indica cual es la norma internacional que deben usar (APA, Harvard, ISO, Vancouver o alguna otra).</li>
                                            <li>Mención del no compromiso con la opinión de los autores. Se recomienda deslindar a la institución de la opinión vertida de los autores en sus contribuciones.</li>
                                            <li>Mención de la autorización o prohibición para la reproducción de los artículos. En las revistas se deberá declarar el tipo de uso y reúso que, de acuerdo a la definición original de la revista, se permitirá sobre los contenidos publicados, pudiendo ser alguna de las que a continuación se presentan:<ul>
                                                    <li>Todos los derechos reservados (DR)</li>
                                                    <li>Atribución, no comercial y no derivados (CC BY-NC-ND)</li>
                                                    <li>tribución, no comercial (CC BY-NC)</li>
                                                </ul>
                                            </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>De la presentación de contenidos <br>Los fascículos y contenidos de la revista deberán contener los siguientes elementos:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Tabla de contenidos de cada uno de los fascículos.</li>
                                            <li>Identificación de autores y su afiliación en cada uno de los artículos. Las afiliaciones deberán contener el nombre completo de la institución, la entidad o dependencia, ciudad, estado y país, y preferentemente el registro ORCID de cada autor.</li>
                                            <li>Membrete bibliográfico en los diferentes formatos de publicación (título completo o abreviado, volumen, número, periodo que cubre señalándolo con los meses correspondientes, ISSN y DOI de la revista). Cuando se trata de un PDF se recomienda su integración en todas las páginas. </li>
                                            <li>Integración del DOI institucional en los diferentes formatos de publicación. Cuando se trata de un PDF se recomienda su integración en todas las páginas. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>De información y servicios adicionales <br>Preferentemente se solicita que las revistas también cumplan con los siguientes criterios técnicos:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Publicación del acervo histórico.</li>
                                            <li>Mención de los servicios de información en los que se encuentran incluidas.</li>
                                            <li>Señalar la última fecha de actualización. </li>
                                            <li>Uso de herramientas de búsqueda de contenidos en el sitio web de la revista. </li>
                                            <li>Uso de tecnologías que ayuden a generar métricas de uso como por ejemplo Google Analytics. </li>
                                        </ol>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Criterios específicos para revistas de investigación y técnico-profesionales<br>Para las revistas que se declaran como de investigación (científicas) y las técnico-profesionales que tienen entre sus objetivos ser incorporadas en sistemas de información digitales de alto prestigio (tales como WoS, Scopus, Redalyc, SciELO, Latindex, CRMCyT, por mencionar algunos) adicionalmente deberán:</p>
                                        </div>
                                        <ol type="i">
                                            <li>Mostrar la siguiente información mínima tanto en español como en inglés:<ul>
                                                    <li>Descripción, objetivo y alcance</li>
                                                    <li>Normas éticas y malas prácticas</li>
                                                    <li>Política para la detección del plagio</li>
                                                    <li>Normas editoriales</li>
                                                    <li>Instrucciones para los autores</li>
                                                    <li>Títulos, resúmenes y palabras clave de los artículos</li>
                                                </ul>
                                                Cuando la revista sólo se publique en idioma inglés, el uso del español puede omitirse.</li>
                                            <li>Señalar en cada uno de los formatos en los que se publiquen los artículos, las fechas de recepción y aceptación del mismo.</li>
                                            <li>Conformar sus comités editoriales y científicos considerando que al menos dos terceras partes de sus integrantes deben ser ajenos a la UNAM. </li>
                                            <li>Publicar al menos el 75% de trabajos originales con respecto al total de los documentos publicados. </li>
                                            <li>Cuidar que al menos el 60% de los trabajos originales que se publiquen en la revista sean de autores externos a la UNAM. </li>
                                            <li>Declarar si se aplica una política de cargo por procesamiento de artículos (APC, por las siglas en inglés de Article Processing Charges). </li>
                                            <li>Publicar preferentemente en los siguientes formatos simultáneamente: formato de almacenamiento para documentos digitales (PDF), formato de lenguaje de marcas de hipertexto (HTML), formato de lenguaje de marcado extensible (XML) o formato adaptable de código abierto para leer textos e imágenes (EPUB). </li>
                                            <li>Integrar modelos de publicación y difusión que permitan acelerar la comunicación de los artículos aceptados y dictaminados, como los denominados primero en línea, publicación adelantada o la publicación continua, lo que disminuye el intervalo entre la fecha de recepción y la fecha de publicación de los documentos, adelantando con ello el tiempo para la circulación, lectura y eventual citación. </li>
                                            <li>Hacer uso de plataformas tecnológicas que permitan optimizar la edición, indización y gestión editorial de las revistas, así como su interoperabilidad con otros sistemas de información. Tal es el caso del Open Journal Systems (OJS). </li>
                                        </ol>
                                    </li>
                                </ol>
                            </li>
                            <li>
                                <div>
                                    <p>CREACIÓN, CONTINUIDAD Y PERMANENCIA DE REVISTAS</p>
                                </div>
                                <ol>
                                    <li>
                                        <div>
                                            <p>Creación de nuevas revistas académicas digitales. La creación de nuevas revistas académicas digitales deberá ser avalada por los comités editoriales de las entidades universitarias considerando la pertinencia del proyecto editorial y la disponibilidad de recursos financieros, técnicos y humanos en el corto, mediano y largo plazo.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Nuevas épocas. Cuando se considere necesario y así lo aprueben los comités editoriales de las entidades universitarias, o en su caso, el consejo técnico o interno, las revistas podrán redefinir sus políticas editoriales (cambio de periodicidad, cambios en el tema o alcance de la revista, cambios en el formato de la revista, entre otros) siempre que se realicen los trámites necesarios ante la DGAJ.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Cambios en títulos o entidades editoras. En casos excepcionales, cuando se considere necesario y así lo aprueben los comités editoriales de las entidades universitarias, las revistas académicas digitales podrán solicitar cambios de título o de entidad editora, con la debida asesoría y los trámites correspondientes por parte de la DGAJ, en la idea de que el cambio de título implica la creación de una nueva revista académica digital, por lo que es necesaria la solicitud de una nueva Reserva de Derechos al Uso Exclusivo respecto al mismo y la asignación de un nuevo digito ISSN, con la consecuente pérdida de los derechos sobre el título que se dejará de usar.</p>
                                        </div>
                                    </li>
                                    <li>
                                        <div>
                                            <p>Fusión. Con la finalidad de optimizar recursos financieros, técnicos y humanos, las entidades universitarias podrán generar acuerdos de fusión de dos o más revistas que por sus características y políticas editoriales puedan ser fusionadas. Lo anterior, en términos estrictamente editoriales, considerando que dicha fusión implica la creación de una nueva revista académica digital, por lo que es necesaria la solicitud de una nueva Reserva de Derechos al Uso Exclusivo respecto al mismo y la asignación de un nuevo digito ISSN, con la consecuente pérdida de los derechos sobre el título que se dejará de usar.</p>
                                        </div>
                                    </li>
                                </ol>
                            </li>
                            <li>APOYO Y ASESORÍA TÉCNICA<br>Para el adecuado cumplimiento de las Directrices Generales, los equipos editoriales podrán solicitar asesoría técnica tanto a la Subdirección de Revistas Académicas y Publicaciones Digitales de la DGPFE como a la DGAJ.</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection